<?php 
    include 'config.php';

    $form_id = $_POST['form_id'];
    $status = $_POST['status'];
    $uid = $_SESSION['user_id'];
    $datenow = date("Y-m-d H:i:s");

    $sql = "UPDATE med_form_status SET status = '$status', date_updated = '$datenow', nurse_id = '$uid' WHERE form_id = '$form_id'";
    $query = mysqli_query($conn, $sql);
    $response = [];
    if ($query) {
        $response = array(
            'status' => 'success',
            'message' => 'Updated Successfuly'
        );
    }

    echo json_encode($response);