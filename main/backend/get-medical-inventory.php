<?php
include('config.php');

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? $_GET['limit'] : 10;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM med_despensary ORDER BY id DESC LIMIT $start, $limit";
$query = mysqli_query($conn, $sql);

$all = "SELECT * FROM med_despensary";
$getter = mysqli_query($conn, $all);

$response = [];
$res = [];

while($r = mysqli_fetch_assoc($getter)) {
    $res[] = $r;
}

while ($row = mysqli_fetch_assoc($query)) {
    $response[] = $row;
}


$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM med_despensary");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];
$totalPages = ceil($totalRecords / $limit);


$responseData = [
    'data' => $response,
    'allData' => $res,
    'totalPages' => $totalPages
];

echo json_encode($responseData);
?>
