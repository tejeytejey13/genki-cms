<?php
    include('config.php');

    $id = $_POST['id'];
    $sql = "DELETE FROM med_despensary WHERE id = $id";
    mysqli_query($conn, $sql);

    echo "success";