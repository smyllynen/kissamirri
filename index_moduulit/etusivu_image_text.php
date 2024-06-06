<div class="container-fluid p-5">
  <hr class="featurette-divider">
  <div class="row featurette align-items-center">
    <div class="col-md-7 order-md-2">
      <?php
      // Create a connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Prepare statement
      $sql = "SELECT title, large_text, image FROM image_texts";
      $result = $conn->query($sql);

      // Check query success
      if ($result === false) {
        die("Query failed: " . $conn->error);
      }

      // Print text and image in HTML format
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          // Sanitize output with htmlspecialchars
          $title = htmlspecialchars($row["title"]);
          $large_text = htmlspecialchars($row["large_text"]);
          $image = htmlspecialchars($row["image"]);

          // Print title as an h2 heading
          echo "<h2 class='featurette-heading'>" . $title . " <span class='text-muted'></span></h2>";

          // Split text into paragraphs
          $paragraphs = explode("\n", $large_text);

          // Print each paragraph in a <p> tag
          foreach ($paragraphs as $paragraph) {
            echo "<p>" . $paragraph . "</p>";
          }
        }
      } else {
        echo "No results";
      }

      // Close connection
      $conn->close();
      ?>
    </div>
    <div class="col-md-5 order-md-1">
      <?php
      // Print image
      if (isset($image)) {
        echo "<img src='" . $image . "' alt='Image' class='img-fluid mx-auto d-block'>";
      }
      ?>
    </div>
  </div>
</div>