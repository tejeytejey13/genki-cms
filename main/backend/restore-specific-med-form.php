<?php 
    include('config.php');

    $formid = $_POST['form_id'];

    $getConst = $conn->query("SELECT * FROM consultation_form WHERE medical_form = '$formid' AND status = 'archived'");
    if($getConst->num_rows > 0){
        $delConst = $conn->query("UPDATE consultation_form SET status = 'approved' WHERE medical_form = '$formid'");
        $restore = $conn->query("DELETE FROM archived_clinic_appointments WHERE appointment_id = '$formid'");
        $res = $conn->query("UPDATE med_form_status SET status = 'approved' WHERE form_id = '$formid'");
    }else{
        $restore = $conn->query("DELETE FROM archived_clinic_appointments WHERE appointment_id = '$formid'");
        $res = $conn->query("UPDATE med_form_status SET status = 'pending' WHERE form_id = '$formid'");
    }