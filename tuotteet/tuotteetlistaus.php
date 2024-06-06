


<?php


$title = "Kissimirri suklaatupa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT id, nimi, kuvaus, hinta, kuva, url FROM tuotteet");
$stmt->execute();

$result = $stmt->get_result();

echo '<div class="container-fluid p-5">'; // Start a new container
echo '<div class="row">'; // Start a new row

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
	
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
	<a href="<?php echo htmlspecialchars($row['url']); ?>">
      <div class="card h-100">
        
          <img src="<?php echo htmlspecialchars($row["kuva"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["nimi"]); ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row["nimi"]); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($row["kuvaus"]); ?></p>       
          </div>
          <div class="card-footer">
		  <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Hinta <?php echo htmlspecialchars($row["hinta"]); ?> €</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Tilaa tästä</button>
                </div>
            
          </div>
        
      </div>
	  </a>
    </div>
    <?php
  }
} else {
  echo "0 results";
}

echo '</div>'; // End the row
echo '</div>'; // End the container

$conn->close();



?>