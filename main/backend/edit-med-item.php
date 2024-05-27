<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['inventoryID'];
    $quantity = $_POST['inventoryQuantity'];
    $datenow = date("Y-m-d H:i:s");

    $query = "UPDATE med_despensary SET quantity = '$quantity', date_updated = '$datenow' WHERE id = '$id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $response = [
            'status' => 'success',
            'message' => 'Updated Successfuly',
            'quantity' => $quantity
        ];
    }
}
