<?php

    include('config.php');

    $grade_lvl = $_POST['grade_level'];
    $number = preg_replace('/\D/', '', $grade_lvl);
    $sql = $conn->query("SELECT * FROM section WHERE section_num = '$number'");
    $data = [];
    
    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);