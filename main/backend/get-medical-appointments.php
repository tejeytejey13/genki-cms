<?php
include('config.php');

$uid = $_SESSION['user_id'];
$sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    $row['sess_nurse_id'] = $uid;
    $response[] = $row;

}
echo json_encode($response);    