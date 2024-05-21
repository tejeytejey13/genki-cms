<?php 
    include('config.php');

    $formid = $_POST['form_id'];

    $restore = $conn->query("DELETE FROM archived_clinic_appointments WHERE appointment_id = '$formid'");
    $res = $conn->query("UPDATE med_form_status SET status = 'pending' WHERE form_id = '$formid'");
    