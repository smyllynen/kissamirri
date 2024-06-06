
<?php
include "asetukset.php";
include "debuggeri_simple.php";
$active = basename($_SERVER['PHP_SELF'],'.php');
if (!function_exists('active')) {
  function active($sivu, $active) {
      return $active == $sivu ? 'active' : '';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<div class="logo">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta description="joku kuvausteksti" author="Sari MYllynen">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="css/kissimirri.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<?php
if (isset($css)) echo "<link rel='stylesheet' href='$css'>";
if (isset($js)) echo "<script defer src='$js'></script>";


?>
<title><?=$title?></title>
<script>
let poista_invalid = event => {
  /* Oma kuuntelijafunktio, jotta kuuntelijan voi myös poistaa. */
  const input = event.target
  input.classList.remove('is-invalid')
  input.removeEventListener('input', poista_invalid)
  }

window.onload = function () {'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  /* Huom. forEach-metodi toimii nodeListin kanssa v.2020 alkaen.
     Array.prototype.slice.call(forms) */
  forms.forEach(function (form) {
    /* Kenttään kirjoitus poistaa virheilmoituksen palvelimelta. */
    form.querySelectorAll('.is-invalid').forEach(input => {
      input.addEventListener('input', poista_invalid)
      })

    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        
        /* Oletusvirheilmoitustekstit Javascriptistä,
           syrjäyttävät mahdolliset virheilmoitustekstit palvelimelta. */           
        form.querySelectorAll('.invalid-feedback').forEach(element => {
          const input = element.previousElementSibling
          element.textContent = input.validationMessage
          })

        /* Ei lomakkeen lähetystä, jos validointi ei mene läpi. */
        event.preventDefault()
        event.stopPropagation()
        }
      form.classList.add('was-validated')
      }, false)
    })
  }
</script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="kuvat/logo.webp" alt="Logo">
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
      echo "<li class='nav-item ".active('index',$active)."'><a class='nav-link' href='index.php'>Yritys</a></li>";
      echo "<li class='nav-item ".active('tuotteet',$active)."'><a class='nav-link' href='tuotteet.php'>Tuotteet</a></li>";
      echo "<li class='nav-item ".active('tuotteidentilaus',$active)."'><a class='nav-link' href='tuotteidentilaus.php'>Tuotteiden tilaus</a></li>";
      echo "<li class='nav-item ".active('rekisterointilomake',$active)."'><a class='nav-link' href='rekisterointilomake.php'>Jäsenyys</a></li>";
      ?>
    </ul>
  </div>
 
</nav>
<!-- Rest of your code -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>