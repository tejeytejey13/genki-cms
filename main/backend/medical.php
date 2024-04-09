<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['user_id'];
    $user_lname = lcfirst($_POST['lname']);
    $user_fname = lcfirst($_POST['fname']);
    $user_mname = lcfirst($_POST['mname']);
    $grade_level = $_POST['grade-level'];
    $adviser = $_POST['adviser'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $address = $_POST['address'];
    $parent_name = $_POST['parent_name'];
    $rel_to_stud = $_POST['rel_to_stud'];
    $contact_num = $_POST['contact_num'];
    $emerg_name = $_POST['emerg_name'];
    $emerg_num = $_POST['emerg_num'];
    $allergy = $_POST['alergy'];
    $reason = $_POST['reason'];
    $treatment = $_POST['treatment'];
    $immunization = $_POST['option'];
    $date_med = $_POST['date_med'];
    $time_med = $_POST['time'];
    for ($i = 0; $i < 4; $i++) {
        $randomNumber = rand(1, 100);
        $appointmentid = $randomNumber;
    }

    $sql = "INSERT INTO medical_form 
    (
        user_id,
        first_name, 
        middle_initial, 
        last_name, 
        grade, 
        adviser, 
        birthdate, 
        place_of_birth, 
        address, 
        parent_guardian, 
        rel_to_stud, 
        contact_num, 
        emergency_name, 
        emergency_num,
        alergy,
        reason,
        treatment,
        immunization,
        date_med,
        time_med
    ) VALUES (
        '$uid',
        '$user_fname',
        '$user_mname',
        '$user_lname',
        '$grade_level',
        '$adviser',
        '$birthdate',
        '$birthplace',
        '$address',
        '$parent_name',
        '$rel_to_stud',
        '$contact_num',
        '$emerg_name',
        '$emerg_num',
        '$allergy',
        '$reason',
        '$treatment',
        '$immunization',
        '$date_med',
        '$time_med'
    )";
    $query = mysqli_query($conn, $sql);
    if($query) {
        $last_id = mysqli_insert_id($conn);
        $insertStatus = "INSERT INTO med_form_status (form_id, status) VALUES ('$last_id', 'pending')";
        mysqli_query($conn, $insertStatus);

        $response = array(
            'status' => 'success',
            'message' => 'Submitted successfully'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Submission failed'
        );
    }
    echo json_encode($response);
    
}
