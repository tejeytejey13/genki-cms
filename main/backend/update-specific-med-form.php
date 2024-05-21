<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';
    include 'config.php';

    $form_id = $_POST['form_id'];
    $status = $_POST['status'];
    $uid = $_SESSION['user_id'];
    $datenow = date("Y-m-d H:i:s");

    $getuser = "SELECT * FROM medical_form WHERE id = " . $form_id;
    $qoruser = mysqli_query($conn, $getuser);
    $rowuser = mysqli_fetch_array($qoruser);
    $fullname = $rowuser['first_name'] . " " . $rowuser['middle_initial'] . " " . $rowuser['last_name'];
    $gt = "SELECT * FROM users WHERE id = " . $rowuser['user_id'];
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
        $mail->AddEmbeddedImage('../img/email-tmp/MEDICAL 2 (1).png', 'med_submit');
        $mail->Body    = '<img alt="PHPMailer" src="cid:med_submit">';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $sql = "UPDATE med_form_status SET status = '$status', date_updated = '$datenow', nurse_id = '$uid' WHERE form_id = '$form_id'";
    $query = mysqli_query($conn, $sql);
    $response = [];
    if ($query) {
        $response = array(
            'status' => 'success',
            'message' => 'Updated Successfuly'
        );
    }

    echo json_encode($response);