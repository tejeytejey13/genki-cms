<?php 
    include('config.php');

    $formID = $_POST['form_id'];

    $sql = "INSERT INTO archived_clinic_appointments (appointment_id) VALUES ('$formID')";
    mysqli_query($conn, $sql);

    $change = "UPDATE med_form_status SET status = 'archived' WHERE form_id = '$formID'";
    mysqli_query($conn, $change);
    
    $change2 = "UPDATE consultation_form SET status = 'archived' WHERE medical_form = '$formID'";
    mysqli_query($conn, $change2);

    $response = [
        'status' => 'success',
        'message' => 'Appointment archived successfully',
    ];
    echo json_encode($response);