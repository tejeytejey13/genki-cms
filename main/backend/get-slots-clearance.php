<?php 

    include('config.php');

    $sql = "SELECT * FROM clearance_slots";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $response = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $response[] = $row;
        }
        
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'No data found'
        );

    }
    echo json_encode($response);