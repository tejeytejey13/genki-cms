<?php 
    include('config.php');

    $sched = $_POST['targetValue'];
    $day = $_POST['targetDay'];
    $newdate = date('Y-m-d', strtotime($day));

    $sql = "INSERT INTO clearance_slots (date, time, slots) VALUES ('$newdate', '$sched', 15)";
    $query = mysqli_query($conn, $sql);

    if($query) {
        $response = [
            'status' => 'success',
            'message' => 'slots successfuly inserted',
            'day' => $newdate,
            'sched' => $sched
        ];
        echo json_encode($response);
    }else{
        $response = [
            'status' => 'failed',
            'message' => 'failed',
            'day' => $newdate,
            'sched' => $sched
        ];
        echo json_encode($response);
    }

