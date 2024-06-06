
<?php
// jäsenyys
// Tietokantayhteys
$title = "Kissimirri suklaatupa";
include "header.php";

// Luo yhteys
$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkista yhteys
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

// INSERT-lauseke
$sql_insert = "INSERT INTO tarjoukset (nimi, kuvaus, alennus, alkamispaiva, paattymispaiva, rajoitukset, kuva) 
VALUES (?, ?, ?, ?, ?, ?, ?)";

// Valmistele lause
$stmt_insert = $conn->prepare($sql_insert);

// Tarkista valmistelun onnistuminen
if ($stmt_insert === false) {
    die("Valmistelu epäonnistui: " . $conn->error);
}

// Aseta parametrit
$nimi = 'Tarjous 1';
$kuvaus = 'Tämä on tarjous 1 kuvaus';
$alennus = 10;
$alkamispaiva = '2024-03-01';
$paattymispaiva = '2024-03-15';
$rajoitukset = 'Ei rajoituksia';
$kuva = 'polku/kuva1.jpg';



// SQL-kysely tarjousten hakemiseksi valmisteltua lausetta käyttäen
$sql_select = "SELECT * FROM tarjoukset ORDER BY tarjousID DESC"; // Haetaan tarjoukset viimeisimmän lisäyksen mukaan

// Valmistele lause
$stmt_select = $conn->prepare($sql_select);

// Tarkista valmistelun onnistuminen
if ($stmt_select === false) {
    die("Valmistelu epäonnistui: " . $conn->error);
}

// Suorita kysely
$stmt_select->execute();

// Nouda tulokset
$result = $stmt_select->get_result();

// Näytä tarjoukset tuotekorteilla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="' . $row["kuva"] . '" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["nimi"] . '</h5>
                            <p class="card-text">' . $row["kuvaus"] . '</p>
                            <p class="card-text"><small class="text-body-secondary">Alennus: ' . $row["alennus"] . '%</small></p>
                            <p class="card-text"><small class="text-body-secondary">Alkaa: ' . $row["alkamispaiva"] . '</small></p>
                            <p class="card-text"><small class="text-body-secondary">Päättyy: ' . $row["paattymispaiva"] . '</small></p>
                            <p class="card-text"><small class="text-body-secondary">Rajoitukset: ' . $row["rajoitukset"] . '</small></p>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo "Ei tarjouksia saatavilla.";
}

// Sulje valmisteltu lause ja tietokantayhteys
$stmt_select->close();
$conn->close();
?>

<?php

include "footer.html";
?>


