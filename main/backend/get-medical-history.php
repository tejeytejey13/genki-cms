<?php
include('config.php');

$uid = $_SESSION['user_id'];
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? $_GET['limit'] : 10;
$start = ($page - 1) * $limit;
// 
if($uid == 1){
    $sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id ORDER BY med_form_status.id DESC LIMIT $start, $limit";
    $totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM medical_form");
}else{
    $sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id WHERE medical_form.user_id = '$uid' ORDER BY med_form_status.id DESC LIMIT $start, $limit";
    $totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM medical_form WHERE user_id = '$uid'");
}
$query = mysqli_query($conn, $sql);
$response = [];
$all = [];


$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];
$totalPages = ceil($totalRecords / $limit);

while ($row = mysqli_fetch_assoc($query)) {
    $response[] = $row;

}
$all = [
    'all' => $response,
    'totalPages' => $totalPages,
    'uid' => $uid
];


echo json_encode($all);    