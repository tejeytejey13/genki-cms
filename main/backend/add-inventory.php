<?php 
    include('config.php');

    $id = $_POST['Item_id'];
    $name = $_POST['Item_name'];
    $quantity = $_POST['Item_quantity'];

    $sql = "INSERT INTO med_despensary (item_id, name, quantity) VALUES ('$id', '$name', '$quantity')";
    $query = mysqli_query($conn, $sql);

    if($query) {
        $response = [
            'status' => 'success',
            'message' => 'item successfuly inserted'
        ];
    }
    echo json_encode($response);