<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';
    include('config.php');

    $user_id = $_POST['stud_user_id'];
    $stud_form_id = $_POST['stud_form_id'];
    $type = $_POST['type_findings'];
    $reasons = $_POST['reason_findings'];
    $medication = $_POST['medications_cert'];
    $med_quantity = $_POST['quantity_med'];
    $treatment = $_POST['special_trtmnt'];

    $sql = "INSERT INTO medical_certificate (user_id, findings, reasons, medications, quantity, special_treatment) VALUES 
    ('$user_id', '$type', '$reasons', '$medication', '$med_quantity', '$treatment')";
    $query = mysqli_query($conn, $sql);
    $response = [];

    $min = "UPDATE med_despensary SET quantity = quantity - '$med_quantity' WHERE name = '$medication'";
    mysqli_query($conn, $min);

    $getuser = "SELECT * FROM medical_form WHERE user_id = " . $user_id;
    $qoruser = mysqli_query($conn, $getuser);
    $rowuser = mysqli_fetch_array($qoruser);
    $fullname = $rowuser['first_name'] . " " . $rowuser['middle_initial'] . " " . $rowuser['last_name'];
    $gt = "SELECT * FROM users WHERE id = " . $user_id;
    $qgt = mysqli_query($conn, $gt);
    $rowgt = mysqli_fetch_array($qgt);

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
        $mail->addAddress($rowgt['email'], $fullname);

        $mail->isHTML(true);
        $mail->Subject = 'Genki - Clinic Management System';
        $mail->AddEmbeddedImage('../img/assets/2.png', 'med_submit');
        $mail->Body    = '<img alt="PHPMailer" src="cid:med_submit">';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $cnsl = "UPDATE consultation_form SET status = 'approved' WHERE medical_form = '$stud_form_id'";
    $qr = mysqli_query($conn, $cnsl);
    
    if($query){
        $reponse = [
            'status' => 'success',
            'message' => 'Successfully Submitted',
        ];
    }else{
        $response = [
            'status' => 'failed',
            'message' => 'Failed to Submit',
        ];
    }
    
    echo json_encode($response);