
<?php
session_start();

$title = "Kissimirri suklaatupa";
include "header.php";
$database = "otayhteytta";
include "tuotteet\\tuotteet_banner.php";
include "tunnukset.php";



?>


<div class="container">
        <?php
       if (isset($_SESSION['tuoteidentilaus'])) {
        $tilaus = $_SESSION['tuoteidentilaus'];
        echo "<h1>Kiitos tilauksestasi, " . $tilaus['nimi'] . "!</h1>";
        echo "<p>Valitsit aiheeksi: " . $tilaus['aihe'] . "</p>";
    } else {
        echo "<p>Ei aktiivista tilausta.</p>";
    }
        ?>
</div>
<?php
include "footer.html";
?>