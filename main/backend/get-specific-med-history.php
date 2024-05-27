<?php
include('config.php');

$uid = $_GET['uid'];
$sql = "SELECT * FROM med_form_status INNER JOIN medical_form ON med_form_status.form_id = medical_form.id  WHERE form_id = '$uid'";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    if($row['nurse_id'] > 0){
        if($row['nurse_id'] == 1){
            $row['nurse_name'] = "Admin Admin";
        }else{
            $qry = mysqli_query($conn, "SELECT first_name, last_name FROM nurse WHERE user_id = '" . $row['nurse_id'] . "'");
            $ns = mysqli_fetch_assoc($qry);
            $row['nurse_name'] = ucfirst($ns['first_name']) . " " . ucfirst($ns['last_name']);
        }
    }else{
        $row['nurse_name'] = "Not Assigned Yet";
    }
    $response[] = $row;
}
echo json_encode($response);    