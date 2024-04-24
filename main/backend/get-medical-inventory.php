<?php
include('config.php');

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? $_GET['limit'] : 10;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM med_despensary LIMIT $start, $limit"; ;
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    $response[] = $row;

}
echo json_encode($response);    