<?php
if (!defined('DEBUG')) {
    define('DEBUG', true);
}

error_reporting(E_ALL);
$PALVELIN = $_SERVER['HTTP_HOST'];
$PALVELU = "kissimirri";
$LINKKI_RESETPASSWORD = "resetpassword.php";
$LINKKI_VERIFICATION = "verification.php";
$PALVELUOSOITE = "";


$DB = "neilikka";
$LOCAL = in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','REMOTE_ADDR' => '::1'));
if ($LOCAL) {	
    $tunnukset = "tunnukset.php";
    if (file_exists($tunnukset)){
        include_once($tunnukset);
        } 
    else {
        die("Tiedostoa ei löydy, ota yhteys ylläpitoon.");
        } 
    $db_server = $db_server_local;
    $db_username = $db_username_local; 
    $db_password = $db_password_local;
    $EMAIL_ADMIN = $admin_mail;
    }



?>


