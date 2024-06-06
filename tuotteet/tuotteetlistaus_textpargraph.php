<?php

try {
    // Luodaan yhteys PDO-luokan avulla
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Asetetaan PDO:n virhemoodi, jotta se heittää poikkeuksen virhetilanteissa
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Suoritetaan SQL-kysely
    $stmt = $conn->prepare("SELECT content, element_type FROM list_textpargraph");
    $stmt->execute();
    
    // Tarkistetaan, onko tuloksia
    if ($stmt->rowCount() > 0) {
        echo '<div class="container-fluid p-5">';
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          // Tarkistetaan, että content ja element_type eivät ole null
          $content = isset($row['content']) ? htmlspecialchars($row['content']) : '';
          $element_type = isset($row['element_type']) ? htmlspecialchars($row['element_type']) : '';
      
          // Tulostetaan tietokannasta haetut tiedot
          if (!empty($element_type) && !empty($content)) {
              echo "<$element_type>$content</$element_type>";
          }
      }
      


        echo '</div>';
    } else {
        echo "0 results";
    }
} catch(PDOException $e) {
    echo "Yhteys epäonnistui: " . $e->getMessage();
}

// Suljetaan tietokantayhteys
$conn = null;
?>



