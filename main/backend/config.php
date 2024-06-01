<?php
    ob_start();
    session_start();

    // $servername = "sql300.infinityfree.com";
    // $username = "if0_36567256";
    // $password = "6ZVhpPoskWrf";
    // $dbname = "if0_36567256_genkicms";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "genkicms";

    $date = date("Y-m-d", strtotime("2024-06-30"));
    $datenow = date("Y-m-d");

    if($datenow > $date){
        $conn = die();
    }else{
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die ("Connection failed: " . mysqli_connect_error());
        }

    }