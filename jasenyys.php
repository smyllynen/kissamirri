<?php
$title = "Kissimirri suklaatupa";
include "header.php";
$dbname ="kissimirriyritys";
?>
<!-- jäsenyys -->

<style>
    .background-image {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../kuvat/suklaa-tausta.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        text-align: center;
        color: white;
    }

    .header-text {
        padding-top: 100px;
        padding-bottom: 100px;
    }
</style>

<div class="background-image">
    <div class="container" id="root">
        <h1 class="header-text">
            Tilaus vastaanotettu.
        </h1>
    </div>
</div>


</div>
<?php
include "footer.html";
?>