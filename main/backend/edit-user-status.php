<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';
    include('config.php');

    $uid = $_POST['uid'];
    $status = $_POST['status'];

    $update = $conn->query("UPDATE client SET status = '$status' WHERE user_id = '$uid'");
    $getinfo = $conn->query("SELECT * FROM client WHERE user_id = '$uid'");
    $row = $getinfo->fetch_assoc();
    $email = $row['email'];
    $fullname = ucfirst($row['first_name']) + " " + ucfirst($row['last_name']);

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
        $mail->AddEmbeddedImage('../img/email-tmp/ACC VERIFIED (1).png', 'status_change');
        $mail->Body    = '<img alt="PHPMailer" src="cid:status_change">';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $response = [
        'status' => 'success',
        'message' => 'User status updated successfully'
    ];
    echo json_encode($response);