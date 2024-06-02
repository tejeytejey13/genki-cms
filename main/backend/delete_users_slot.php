<?php
    include('config.php');

    $user_slot_id = $_POST['slotUID'];

    $query = $conn->query("DELETE FROM user_slot_clearance WHERE slot_id = $user_slot_id");

    echo "success";