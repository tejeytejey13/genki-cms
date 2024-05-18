<?php 
    include('config.php');

    $uid = $_GET['uid'];
    $query = "SELECT * FROM nurse WHERE user_id = '$uid'";
    $sql = mysqli_query($conn, $query);
    $response = [];
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        // $fullname = ucfirst($row['first_name']) + ' ' + ucfirst($row['last_name']);
        $response = [
            'nurse_name' => ucfirst($row['first_name']) . ' ' . ucfirst($row['last_name']),
            'nurse_status' => $row['status'],
            'nurse_id' => $row['user_id'],
            'date_created' => $row['date_created']
        ];

    }

    echo json_encode($response);