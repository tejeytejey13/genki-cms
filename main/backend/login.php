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
            
            if ($user_type === 'nurse') {
                $checkAcc = "SELECT * FROM nurse WHERE user_id = '$userid'";
                $queryAcc = mysqli_query($conn, $checkAcc);
                $row = mysqli_fetch_array($queryAcc);

                if($row['status'] !== 'active'){
                    $response['status'] = 'error';
                    $response['message'] = 'Please activate your account first';
                    $response['user_type'] = $user_type;
                    echo json_encode($response);
                }else{
                    $response['status'] = 'success';
                $response['message'] = 'Login successful';
                $response['user_type'] = $user_type;
    
                echo json_encode($response);
                }
            }else if($user_type == 'client'){
                $checkClient = $conn->query("SELECT * FROM client WHERE user_id = '$userid'");
                $rowClient = $checkClient->fetch_assoc();
                // $response[] = $rowClient;
                if($rowClient['status'] !== 'active'){
                    $response['status'] = 'error';
                    $response['message'] = 'Wait for admin to approve your account';
                    $response['user_type'] = $user_type;
                    echo json_encode($response);
                }else{
                    $response['status'] = 'success';
                $response['message'] = 'Login successful';
                $response['user_type'] = $user_type;
    
                echo json_encode($response);
                }
            } else {
                $response['status'] = 'success';
                $response['message'] = 'Login successful';
                $response['user_type'] = $user_type;
    
                echo json_encode($response);
            }

            


        }else{

            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password';
            echo json_encode($response);
        }
    }