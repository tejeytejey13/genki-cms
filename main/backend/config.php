<?php
    ob_start();
    session_start();

    $servername = "sql300.infinityfree.com";
    $username = "if0_36567256";
    $password = "6ZVhpPoskWrf";
    $dbname = "if0_36567256_genkicms";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "genkicms";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die ("Connection failed: " . mysqli_connect_error());
    }