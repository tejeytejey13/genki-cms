<?php
include('config.php');

$response = [];

if(isset($_GET['search_stud'])) {
    $value = $_GET['search_stud'];

    $sql = "SELECT school_id FROM users WHERE school_id LIKE '%$value%'";
    $query = mysqli_query($conn, $sql);

    if($query) {
        while ($row = mysqli_fetch_array($query)) {
            $response[] = $row['school_id'];
        }
    } else {
        $response['error'] = 'Error executing query';
    }
} else {
    $response['error'] = 'No search term provided';
}

echo json_encode($response);
?>