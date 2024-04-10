<?php
    session_start();
    session_destroy();
    session_abort();

    $response = array(
        'status' => 'success',
        'message' => 'Logged out successfully'
    );

    echo json_encode($response);