<?php
include('config.php');

$uid = $_GET['uid'];
$sql = "SELECT * FROM med_form_status INNER JOIN medical_form ON med_form_status.form_id = medical_form.id  WHERE form_id = '$uid'";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    $qry = mysqli_query($conn, "SELECT first_name, last_name FROM nurse WHERE user_id = '" . $row['nurse_id'] . "'");
    $ns = mysqli_fetch_assoc($qry);
    $row['nurse_name'] = ucfirst($ns['first_name']) . " " . ucfirst($ns['last_name']);
    $response[] = $row;
}
echo json_encode($response);    