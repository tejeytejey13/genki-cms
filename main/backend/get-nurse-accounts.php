<?php 
    include('config.php');

    $sql = "SELECT * FROM nurse";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $response[] = $row;
    };

    echo json_encode($response);