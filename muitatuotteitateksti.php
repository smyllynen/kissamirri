<div class="container">
    <?php
    if (isset($_SESSION['tilaus'])) {
        $tilaus = $_SESSION['tilaus'];
        echo "<h1>Kiitos tilauksestasi, " . $tilaus['nimi'] . "!</h1>";
        echo "<p>Valitsit aiheeksi: " . $tilaus['aihe'] . "</p>";
    } else {
        echo "<p>Ei aktiivista tilausta.</p>";
    }
    ?>
</div>