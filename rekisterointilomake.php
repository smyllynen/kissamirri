<?php
$title = "Rekisteröityminen";
$js = "rekisterointi.js";
include 'db.php';
include 'header.php';
include 'lomakerutiinit.php';
include 'rekisterointi.php';
?>
<!-- jäsenyys -->
<div class="container" id="root">
    <h1>Jäseneksi </h1>
    <p>Liittyessänne Kissa Mirri Suklaa -jäseniksi saatte nauttia monista herkullisista eduista. Ensinnäkin, saatte ensimmäisinä tiedon kaikista herkullisista tapahtumistamme! Järjestämme jäsenillemme eksklusiivisia herkkukokemuksia, joissa voitte maistella upeita suklaaherkkuja ja muita makeisia.

Mutta odottakaa, siellä on vielä enemmän! Jäsenenämme saatte myös erityisiä alennuksia ja tarjouksia herkullisista herkuista. Kissa Mirri Suklaa -jäsenenä saatte etuoikeuden päästä käsiksi upeisiin suklaatuotteisiin ja makeisiin herkkuihin edullisesti.

Mutta tässä ei suinkaan kaikki! Olette mukana myös herkullisissa arvonnoissamme, joissa voitte voittaa uskomattomia palkintoja herkkukorillamme. Kuvitelkaa voiton riemua, kun saatte kotiinne laadukkaita suklaalevyjä, makeisia ja muita herkkuja.</p>
<form id="rekisterointilomake" class="mb-3 needs-validation" novalidate action="rekisterointilomake.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Rekisteröityminen</legend>
<?php   
foreach ($lomakekentat as $kentta) {
    $required[$kentta] = in_array($kentta, $pakolliset) ? true : false;
    }
input_kentta('Etunimi',required:$required['firstname'],autofocus:true);
input_kentta('Sukunimi',required:$required['lastname']);
input_kentta('email',required:$required['email']);
input_kentta('Puhelin',required:$required['phonenumber']);
input_kentta('Salasana',type:"password",required:$required['password']);
input_kentta('Salasana',type:"password",required:$required['password'],label:"Salasana uudestaan");
?>
<div class="col-11 d-flex justify-content-end mt-4">
<button name='button' class="btn btn-primary me-4" type="submit">Lisää</button>
</div>
</fieldset>
</form>

<?php   
if (isset($_GET['message']) && isset($_GET['success'])) {
    $display = "";
    $message = $_GET['message'];
    $success = $_GET['success'];
    ?>
    <div id="ilmoitukset" class="alert alert-<?= $success ;?> alert-dismissible fade show <?= $display ?? ""; ?>" role="alert">
    <p><?= $message; ?></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php   
}
?>
</div>
<?php
include "footer.html";
?>

