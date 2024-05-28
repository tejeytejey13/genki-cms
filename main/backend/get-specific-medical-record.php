<?php
    include('config.php');

    $id = $_GET['uid'];

    $getMedCert = $conn->query("SELECT * FROM medical_certificate WHERE id = '$id'");
    $row = $getMedCert->fetch_assoc();
    $getMedForm = $conn->query("SELECT * FROM medical_form WHERE id = '$id'");
    $row2 = $getMedForm->fetch_assoc();

    $response = [];

    $row2['medical_cert'] = $row;
    $response = [
        'status' => 'success',
        'data' => $row2
    ];

    echo json_encode($response);