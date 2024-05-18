<?php
include('config.php');

$uid = $_SESSION['user_id'];
$sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    $medid = $row['form_id'];
    $const = "SELECT * FROM consultation_form WHERE medical_form = '$medid'";
    $const_query = mysqli_query($conn, $const);
    $coQry = mysqli_fetch_assoc($const_query);

    $row['consultation_status'] = $coQry['status'];
    $row['sess_nurse_id'] = $uid;
    $response[] = $row;

}
echo json_encode($response);    