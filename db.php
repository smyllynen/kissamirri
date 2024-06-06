<?php

include "tunnukset.php";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $conn->connect_error);
    }
$conn->set_charset("utf8");

function query_oma($conn, $query) {
/* Suorittaa kyselyn poimien hallitusti fatal-virheet, joita
   voisi syntyä esim. viiteavaimien estämissä kyselyissä. */
    try {
        $result = $conn->query($query);
        return $result;
        } 
    catch (Throwable $e) {
        if ($conn->errno === 1062) {
            // Handle the duplicate entry scenario
            echo "Samat tiedot ovat jo olemassa. Yritä uudelleen.";
            debuggeri("Virhe kyselyssä $query:\n".$e->getMessage());
            }
        else {
           echo "Virhe tai poikkeus napattu: " . $e->getMessage();
           debuggeri("Virhe kyselyssä $query:\n".$e->getMessage());
            }
        return false;
        }   
    }

function puhdista($conn, $data) {
/* Estää SQL-injektiot. */ 
    if (is_array($data)) $data = implode(",",$data);    
    $data = strip_tags(trim($data));
    $data = $conn->real_escape_string($data);
    return $data;
}
?>