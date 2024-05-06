<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['itemID'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE med_despensary SET quantity = $quantity WHERE item_id = $id";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $response = [
            'status' => 'success',
            'message' => 'Updated Successfuly',
            'quantity' => $quantity
        ];
    }
}
