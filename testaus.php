<?php
$title = "Kissimirri suklaatupa";
include "header.php";

include 'posti.php';
?>
<div style="
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('kuvat/suklaa-tausta.jpg') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    text-align: center;
    color: white;" >
<div class="container" id="root">
    <h1 style="padding-top: 100px; padding-bottom: 100px;">
        
        Suklaata ja hiljaisuutta-
        KissiMirri-Suklaatupa tarjoaa
        rentoutumista herkkujen kera.
    </h1>
</div>


</div>
<?php
$email = "sarimyllynen@gmail.com";
$msg = "Tämä on sähköpostiviesti.";
$subject = "Testiviesti";


$response = posti(trim($email,"'"),$msg,$subject);

echo "Vastaus: $response";

include "footer.html";
?>


