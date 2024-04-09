<?php
include('config.php');

$uid = $_GET['uid'];
$sql = "SELECT * FROM med_form_status INNER JOIN medical_form ON med_form_status.form_id = medical_form.id  WHERE form_id = '$uid'";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    $response[] = $row;
}
echo json_encode($response);    