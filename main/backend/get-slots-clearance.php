<?php 

    include('config.php');

    $sql = "SELECT * FROM clearance_slots";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $response[] = $row;
    }
    echo json_encode($response);