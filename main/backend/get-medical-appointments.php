<?php
include('config.php');

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? $_GET['limit'] : 10;
$start = ($page - 1) * $limit;

$uid = $_SESSION['user_id'];
$sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id LIMIT $start, $limit";
$query = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id ";
$query2 = mysqli_query($conn, $sql2);

$pagdata = [];
$response = [];
$alldata = [];

$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM medical_form");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];
$totalPages = ceil($totalRecords / $limit);


while ($row2 = mysqli_fetch_assoc($query2)) {
    $medid2 = $row2['form_id'];
    $const2 = "SELECT * FROM consultation_form WHERE medical_form = '$medid2'";
    $const_query2 = mysqli_query($conn, $const2);
    $coQry2 = mysqli_fetch_assoc($const_query2);

    $row2['consultation_status'] = $coQry2['status'];
    $row2['sess_nurse_id'] = $uid;
    $pagdata[] = $row2;
}

while ($row = mysqli_fetch_assoc($query)) {
    $medid = $row['form_id'];
    $const = "SELECT * FROM consultation_form WHERE medical_form = '$medid'";
    $const_query = mysqli_query($conn, $const);
    $coQry = mysqli_fetch_assoc($const_query);

    $row['consultation_status'] = $coQry['status'];
    $row['sess_nurse_id'] = $uid;

    $response[] = $row;
}

$alldata = [
    'data' => $response,
    'historyData' => $pagdata,
    'totalPages' => $totalPages
];

echo json_encode($alldata);    