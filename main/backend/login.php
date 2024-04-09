<?php
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $response = [];
        if(mysqli_num_rows($query) > 0) {
            $user = mysqli_fetch_assoc($query);
            $userid = $user['id'];
            $user_type = $user['user_type'];

            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_id'] = $userid;
            
            // $response = array(
            //     'status' => 'success',
            //     'message' => 'Login successful',
            //     'user_type' => $user_type
            // );
            $response['status'] = 'success';
            $response['message'] = 'Login successful';
            $response['user_type'] = $user_type;

            echo json_encode($response);

        }else{
            // $response = array(
            //     'status' => 'error',
            //     'message' => 'Invalid email or password'
            // );
            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password';
            echo json_encode($response);
        }
    }