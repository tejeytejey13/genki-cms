<?php 
    include('config.php');

    $id = $_POST['uid'];
    $status = $_POST['status'];
    
    $sql = "UPDATE nurse SET status = '$status' WHERE user_id = '$id'";
    mysqli_query($conn, $sql);
    $response = [
        'status' => 'success',
        'message' => 'Status updated successfully',

    ];
    echo json_encode($response); 