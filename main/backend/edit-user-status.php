<?php 
    include('config.php');

    $uid = $_POST['uid'];
    $status = $_POST['status'];

    $update = $conn->query("UPDATE client SET status = '$status' WHERE user_id = '$uid'");
    $response = [
        'status' => 'success',
        'message' => 'User status updated successfully'
    ];
    echo json_encode($response);