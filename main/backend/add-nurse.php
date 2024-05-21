<?php
include('config.php');

function generatePassword($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    return 'genki-' . $randomPassword;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $pnum = $_POST['pnum'];
    $response = [];

    if (empty($password)) {
        $pass = generatePassword();
    }else{
        $pass = $password;
    }

    $SELECT = "SELECT id From users Where id = ? Limit 1";
    $INSERT = "INSERT INTO users (email, password, user_type) 
           VALUES (?, ?, 'nurse') 
           ON DUPLICATE KEY UPDATE email = email";


    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $email, $pass);
        $stmt->execute();

        $last_id = mysqli_insert_id($conn);
        $nurseinsert = "INSERT Into nurse (user_id, first_name, middle_initial, last_name, email, phone_number, password, status) values('$last_id', '$firstname', '$middlename', '$lastname', '$email', '$pnum', '$pass', 'disabled')";
        mysqli_query($conn, $nurseinsert);

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
