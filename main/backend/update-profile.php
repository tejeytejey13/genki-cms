<?php
    include('config.php');

    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $response = [];
    $change = $_GET['change'];

    if($change == 'profile') {
        $profileset = $_FILES['pfp_image']['name'];
        $pfpmove = $_FILES['pfp_image']['tmp_name'];
        $email = $_POST['email'];

        if($user_type == 'client'){
            $sql = "UPDATE client SET profile = '$profileset' WHERE id = '$user_id'";
        }else if($user_type == 'nurse'){
            $sql = "UPDATE nurse SET profile = '$profileset' WHERE id = '$user_id'";
        }else if($user_type == 'admin'){
            $sql = "UPDATE admin SET profile = '$profileset' WHERE id = '$user_id'";
        }
        $push = mysqli_query($conn, $sql);
        if($push){
            move_uploaded_file($pfpmove, "../img/profile/$profileset");
            $response = [
                'status' => 'success',
                'message' => 'Profile updated successfully'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Failed to update profile'
            ];
        }
    }else{
        $password_current = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $renew_pass = $_POST['renew_pass'];
        
        $get = "SELECT * FROM users WHERE id = '$user_id'";
        $run = mysqli_query($conn, $get);
        $row = mysqli_fetch_assoc($run);

        if($row['password'] == $password_current){
            if($new_pass == $renew_pass){
                $sql = "UPDATE users SET password = '$new_pass' WHERE id = '$user_id'";
                mysqli_query($conn, $sql);
                $response = [
                    'status' => 'success',
                    'message' => 'Password updated successfully'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'New Password does not match the confirm password!'
                ];
            }
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Password does not match current password!'
            ];
        }
    }

    echo json_encode($response);