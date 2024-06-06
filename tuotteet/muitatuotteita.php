

<?php
// Tietokantaparametrit

// Luo yhteys tietokantaan
$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkista yhteyden tila
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Käytä valmisteltuja lauseita estääksesi SQL-injektioita
$stmt = $conn->prepare("SELECT id, otsikko AS nimi, kuvaus, hinta, kuva, '' AS url FROM muitatuotteita");
$stmt->execute();

$result = $stmt->get_result();

echo '<div class="container-fluid p-5">'; // Aloita uusi konttiineri
echo '<div class="row">'; // Aloita uusi rivi

if ($result->num_rows > 0) {
    // Tulosta jokaisen rivin tiedot
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
           
                <div class="card h-100">
                    <img src="<?php echo htmlspecialchars($row["kuva"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["nimi"]); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row["nimi"]); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row["kuvaus"]); ?></p>       
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
						   <button type="button" class="btn btn-sm btn-outline-secondary">Kappalehinta</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo htmlspecialchars($row["hinta"]); ?> €</button>
                            
                        </div>
                    </div>
                </div>
          
        </div>
        <?php
    }
} else {
    echo "0 results";
}

echo '</div>'; // Sulje rivi
echo '</div>'; // Sulje konttiineri

$conn->close(); // Sulje tietokantayhteys
?>



