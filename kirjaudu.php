<?php
$title = "Kissimirri suklaatupa";
include "header.php";
$dbname = "kissimirriyritys";


session_start();
// Create connection

// Include your database connection script
include 'tunnukset.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get user input
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query the database
  $query = "SELECT id, password FROM users WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id, $hashed_password);
  $stmt->store_result();

  if ($stmt->num_rows == 1) { // If the user exists
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      // Regenerate session ID for security
      session_regenerate_id();

      // Set session variable
      $_SESSION['login_user'] = $email;

      // Redirect to yritys.php
      header("location: jasenyys.php");
      exit;
    }
  }
}

?>

<div class="container-fluid p-5">
  <hr class="featurette-divider">
  <main class="form-signin w-100 m-auto">
    <form method="post" action="">

      <h1 class="h3 mb-3 fw-normal">Kirjaudu sisään</h1>
      <p>Yrityksen omat sivut</p>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email osoite</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Salasana</label>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Muista minut
        </label>
      </div>
      <button class="btn black-white w-100 py-2 " type="submit">Kirjaudu</button>

    </form>
  </main>
  <hr class="featurette-divider">
</div>
<?php

include "footer.html";
?>