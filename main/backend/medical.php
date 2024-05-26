<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['user_id'];
    $user_lname = lcfirst($_POST['lname']);
    $user_fname = lcfirst($_POST['fname']);
    $user_mname = lcfirst($_POST['mname']);
    $grade_level = $_POST['grade-level'];
    $section = $_POST['section'];
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

    $get = "select * from users where id = '$uid'";
    $result = mysqli_query($conn, $get);
    $getter = mysqli_fetch_array($result);
    $email = $getter['email'];
    $fullname = $user_fname . " " . $user_mname . " " . $user_lname;

    $mail = new PHPMailer(true);
    try {
        // $mail->SMTPDebug = 2;                                      
        $mail->isSMTP();
        $mail->Host       = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ryonuzuke@gmail.com';
        $mail->Password   = 'H7qjcmAVzkyhF3RJ';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom("genkipnjkis@gmail.com", 'Genki Clinic - Medical');
        $mail->addAddress($email, $fullname);

        $mail->isHTML(true);
        $mail->Subject = 'Genki - Clinic Management System';
        $mail->AddEmbeddedImage('../img/email-tmp/MEDICAL 1 (1).png', 'med_submit');
        $mail->Body    = '<img alt="PHPMailer" src="cid:med_submit">';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $sql = "INSERT INTO medical_form 
    (
        user_id,
        first_name, 
        middle_initial, 
        last_name, 
        grade, 
        section,
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
        '$section',
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

    if ($query) {
        $last_id = mysqli_insert_id($conn);

        $insertStatus = "INSERT INTO med_form_status (form_id, status) VALUES ('$last_id', 'pending')";
        mysqli_query($conn, $insertStatus);

        $insertConstStatus = "INSERT INTO consultation_form (medical_form, status) VALUES ('$last_id', 'pending')";
        mysqli_query($conn, $insertConstStatus);

        $response = array(
            'status' => 'success',
            'message' => 'Submitted successfully',
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Submission failed'
        );
    }
    echo json_encode($response);
}
