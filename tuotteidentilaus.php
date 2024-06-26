
<?php
session_start();
$title = "Tuotteiden tilaus";
$js = "scripts.js";
include "header.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nimi'], $_POST['email'], $_POST['aihe'], $_POST['viesti'])) {
        include "tunnukset.php";
        $database = "otayhteytta";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO yhteydenotot (nimi, email, aihe, viesti, uutiskirje) VALUES (?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sssss", $nimi, $email, $aihe, $viesti, $uutiskirje);

        $nimi = htmlspecialchars($_POST['nimi']);
        $email = htmlspecialchars($_POST['email']);
        $aihe = htmlspecialchars($_POST['aihe']);
        $viesti = htmlspecialchars($_POST['viesti']);
        $uutiskirje = isset($_POST['uutiskirje']) ? 'kylla' : 'ei';

        if ($stmt->execute()) {
            // Tallenna tilauksen tiedot sessioon
            $_SESSION['tuoteidentilaus'] = [
                'nimi' => $nimi,
                'email' => $email,
                'aihe' => $aihe,
                'viesti' => $viesti,
                'uutiskirje' => $uutiskirje
            ];
            // header("Location: tilaus.php");
            echo "<script>setTimeout(function() { window.location.href = 'tilaus.php'; }, 5000);</script>";
            exit();
        } else {
            echo "Virhe tallennettaessa yhteydenottoa: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Kaikkia tarvittavia kenttiä ei ole täytetty!";
    }
}
       

?>
<div class="container" id="root">
<h1>Tuotteiden tilaus  </h1>
<p>
Tilaa SuklaaMirri leivoksia myymälästä noudettavaksi. Voit maksaa tilauksen joko maksalaskulla, joka toimitetaan sähköpostitse, tai suoraan myymälässä. Tilauksen käsittely kestää 1-2 päivää, ja saat ilmoituksen, kun nouto on valmis.</p>
<form class="mb-3 needs-validation" novalidate action="tuotteidentilaus.php" method="post">

<div class="row mb-2">
<label class="form-label col-sm-4" for="nimi">Nimi</label>
<div class="col-sm-8">
<input class="form-control" type="text" name="nimi" id="nimi" autofocus required>
<div class="invalid-feedback">
Please choose a username.
</div>
</div>
</div>

<div class="row mb-2">
<label class="form-label col-sm-4" for="email">Sähköposti</label>
<div class="col-sm-8">
<input class="form-control" type="email" name="email" id="email" required>
<div class="invalid-feedback">
Please give your email address.
</div>
</div>
</div>

<div class="row mb-2">
<label class="form-label col-sm-4" for="aihe">Aihe</label>
<div class="col-sm-8">
<select class="form-select" name="aihe" id="aihe">
<option value="kysymys">Valitse </option>
<option value="tummasuklaa">Muffini</option>
<option value="maitosuklaa">Suklaakakku</option>
<option value="valkosuklaa">Mokkapalat</option>
<option value="muu">Muu kirjoita viesti kenttään.</option>
</select>
</div>
</div>

<div class="row mb-2">
<label class="form-label col-sm-4" for="viesti">Viesti laita tähän esim allegiat</label>
<div class="col-sm-8">
<textarea class="form-control" name="viesti" id="viesti" rows="5"></textarea>
</div>
</div>

<div class="row mb-2">
<div class="col-sm-4"></div>
<div class="form-check col-sm-8">
<input class="form-check-input" type="checkbox" name="uutiskirje" id="uutiskirje">
<label class="form-check-label" for="uutiskirje">Haluan tilata KissiMirri Suklaatupa uutiskirjeen</label>
</div>
</div>

<div class="col-12 d-flex justify-content-end">
<button class="btn btn-primary me-4" type="submit">Lähetä</button>
</div>

</form>
</div>


<?php
include "footer.html";
?>