<?php
    include('config.php');

    $user = $_GET['user'];
    
    if($user == 'nurse'){
        $sched = $_POST['targetValue'];
        $day = $_POST['targetDay'];
        $config = $_POST['targetConfig'];
        $newdate = date('Y-m-d', strtotime($day));

        if ($config == 'true') {
            $getUserSlots = $conn->query("SELECT * FROM user_slot_clearance");
            while ($row = $getUserSlots->fetch_assoc()) {
                $getid = $row['slot_id'];
                $getitem = $conn->query("SELECT * FROM clearance_slots WHERE id = '$getid'");
                $getrow = $getitem->fetch_assoc();
                $getrowSlotid = $getrow['id'];
                $conn->query("DELETE FROM user_slot_clearance WHERE slot_id = '$getrowSlotid'");
            }
            $sql = "DELETE FROM clearance_slots WHERE date = '$newdate' AND time = '$sched'";

        } else {
            $sql = "INSERT INTO clearance_slots (date, time, slots) VALUES ('$newdate', '$sched', 15)";
        }
        $query = mysqli_query($conn, $sql);
        if ($query) {
            if($config == 'true'){
                $response = [
                    'status' => 'success',
                    'message' => 'slots successfuly deleted',
                    'day' => $newdate,
                    'sched' => $sched
                ];
            }else{
                $response = [
                    'status' => 'success',
                    'message' => 'slots successfuly inserted',
                    'day' => $newdate,
                    'sched' => $sched
                ];
            }

        } else {
            $response = [
                'status' => 'failed',
                'message' => 'failed',
                'day' => $newdate,
                'sched' => $sched
            ];

        }
    }else{
        $sched = $_POST['targetValue'];
        $day = $_POST['targetDay'];
        $newdate = date('Y-m-d', strtotime($day));

        $getSLOT = "SELECT * FROM clearance_slots WHERE date = '$newdate' AND time = '$sched'";
        $query = mysqli_query($conn, $getSLOT);
        $row = mysqli_fetch_array($query);
        $slot_id = $row['id'];
        $user_id = $_SESSION['user_id'];

        mysqli_query($conn, "UPDATE clearance_slots SET slots = slots - 1 WHERE id = $slot_id");
        $insert = "INSERT INTO user_slot_clearance (slot_id, user_id) VALUES ('$slot_id', '$user_id')";
        $ins = mysqli_query($conn, $insert);

        $response = [
            'status' => 'success',
            'message' => 'Slot successfully assigned'
        ];
    }

    echo json_encode($response);