
<?php

// Database connection parameters
;

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare statement
$stmt = $conn->prepare("SELECT title, content, url, button_text, button_state FROM modules");
$stmt->execute();
$stmt->bind_result($title, $content, $url, $button_text, $button_state);

// Open container
echo "<div class='container-fluid p-5'>";

// Open row
echo "<div class='row align-items-md-stretch'>";

// Print modules
while ($stmt->fetch()) {
    // Module column
    echo "<div class='col-md-6'>";
    echo "<div class='h-100 text-white bg-dark rounded-3 p-5 custom'>";
    echo "<h2>" . htmlspecialchars($title) . "</h2>";
    echo "<p>" . htmlspecialchars($content) . "</p>";
    if ($button_state == 1) {
        echo "<a href='" . htmlspecialchars($url) . "' class='btn btn-outline-light' type='button'>" . htmlspecialchars($button_text) . "</a>";
    }
    echo "</div>";
    echo "</div>";
}

// Close row
echo "</div>";

// Close container
echo "</div>";

// Close statement and connection
$stmt->close();
$conn->close();
?>


