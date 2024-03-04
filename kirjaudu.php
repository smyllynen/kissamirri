<?php
$title = "Kissimirri suklaatupa";
include "header.php";
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


<div class="container">
<hr class="featurette-divider">
<main class="form-signin w-100 m-auto">
  <form>
    
    <h1 class="h3 mb-3 fw-normal">Kirjaudu sisään</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email osoite</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Salasana</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Muista minut
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    
  </form>
</main>
<hr class="featurette-divider">
</div>
<?php

include "footer.html";
?>


