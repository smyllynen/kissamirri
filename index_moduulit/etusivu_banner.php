<!-- Tiedoston nimi: suklaatupa.php -->

<?php

// Yhdistetään tietokantaan

$dbname ="kissimirrisivut_etusivu";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_texts = $conn->prepare("SELECT * FROM banner_texts WHERE section = 'welcome'");
$sql_texts->execute();
$result_texts = $sql_texts->get_result();
$texts = $result_texts->fetch_assoc();


$sql_images = $conn->prepare("SELECT * FROM banner_images WHERE section IN ('welcome', 'circle')");
$sql_images->execute();
$result_images = $sql_images->get_result();

$images = [];
while ($row = $result_images->fetch_assoc()) {
    $images[$row['section']][] = $row['url'];
}

    ?>
    <div style="
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo htmlspecialchars($images['welcome'][0]); ?>') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    text-align:center;
    color: white;">
    <div class="container-fluid p-5" style="padding-top: 100px; padding-bottom: 100px;" id="root">
        <div class="row">
            <div class="col-md">
                <h1 style="text-align:left;"><?php echo htmlspecialchars($texts['content']); ?></h1>
            </div>
            <div class="col-md">
               <img src="<?php echo htmlspecialchars($images['circle'][0]); ?>" alt="circle" width="283" height="259">
            </div>
        </div>
    </div>
</div>
