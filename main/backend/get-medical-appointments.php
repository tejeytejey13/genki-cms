<?php
include('config.php');

$sql = "SELECT * FROM medical_form INNER JOIN med_form_status ON medical_form.id = med_form_status.form_id";
$query = mysqli_query($conn, $sql);
$response = [];

while ($row = mysqli_fetch_assoc($query)) {
    // $userid = $row['id'];
    // $fname = $row['first_name'];
    // $mname = $row['middle_initial'];
    // $lname = $row['last_name'];
    // $parent_name = $row['parent_guardian'];
    // $grade = $row['grade'];
    // $adviser = $row['adviser'];
    // $date_created = $row['date_created'];

    // $response = array(
    //     'first_name' => $fname,
    //     'middle_initial' => $mname,
    //     'last_name' => $lname,
    //     'grade' => $grade,
    //     'adviser' => $adviser,
    //     'date_created' => $date_created
    // );
    $response[] = $row;

}
echo json_encode($response);    