<?php
    include('config.php');

    $value = $_POST['search'];

    $sql = "SELECT * FROM users WHERE school_id LIKE '%$value%'";
    $query = mysqli_query($conn, $sql);
    $response = [];
    $row = mysqli_fetch_array($query);
    $user_id = $row['id'];
    $get = "SELECT * FROM medical_form WHERE user_id = '$user_id'";
    $query2 = mysqli_query($conn, $get);
        if ($row2 = mysqli_fetch_array($query2)) {
            $response[] = $row2;
        }

    echo json_encode($response);
