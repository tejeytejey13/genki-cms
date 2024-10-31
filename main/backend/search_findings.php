<?php
include('config.php');

$response = [];

if(isset($_GET['findings'])) {
    $value = $_GET['findings'];

    $sql = "SELECT DISTINCT findings FROM medical_certificate WHERE findings LIKE '$value%'";

    $query = mysqli_query($conn, $sql);

    if($query) {
        while ($row = mysqli_fetch_array($query)) {
            $response[] = $row['findings'];
        }
    } else {
        $response['error'] = 'Error executing query';
    }
} else {
    $response['error'] = 'No search term provided';
}

echo json_encode($response);
?>