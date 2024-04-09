<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<?php
include 'head.php';
?>

<body>
    <div id="app">
        <?php
        include 'nav.php';
        include 'side.php';
        ?>
        <section class="section is-main-section">
            <div class="container-404">
                <img src="./img/assets/medical_logo.svg" alt="Medical Logo" class="logo-404">
                <h1>Not Found</h1>
                <p>Sorry, the page you are looking for is not available.</p>

            </div>

        </section>

    </div>
    <?php require 'footer.php' ?>