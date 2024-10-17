<?php 
    include('config.php');

    $id = $_POST['Item_id'];
    $name = $_POST['Item_name'];
    $quantity = $_POST['Item_quantity'];
    $date_expiry = $_POST['date_expiration'];

    $date = date("Y-m-d H:i:s", strtotime($date_expiry));

    $sql = "INSERT INTO med_despensary (item_id, name, quantity, date_expiry) VALUES ('$id', '$name', '$quantity', '$date')";
    $query = mysqli_query($conn, $sql);

    if($query) {
        $response = [
            'status' => 'success',
            'message' => 'item successfuly inserted'
        ];
    }
    echo json_encode($response);