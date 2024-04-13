<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $school_id = $_POST['schoolID'];
    $response = [];

    $SELECT = "SELECT id From users Where id = ? Limit 1";
    $INSERT = "INSERT INTO users (school_id, email, password, user_type) 
           VALUES (?, ?, ?, 'client') 
           ON DUPLICATE KEY UPDATE email = email";


    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $school_id);
    $stmt->execute();
    $stmt->bind_result($school_id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $school_id, $email, $password);
        $stmt->execute();

        $last_id = mysqli_insert_id($conn);
        $clientinsert = "INSERT Into client (user_id, first_name, middle_initial, last_name, email, password) values('$last_id', '$firstname', '$middlename', '$lastname', '$email', '$password')";
        mysqli_query($conn, $clientinsert);
        
        $response = array(
            'status' => 'success',
            'message' => 'Registered Successfuly',
        );

        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'failed',
            'message' => 'Registered Unsuccessfuly',
        );
        echo json_encode($response);
    }
}
