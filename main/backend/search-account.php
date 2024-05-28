<?php
include 'config.php'; // Include your database connection

$searchQuery = isset($_POST['query']) ? $_POST['query'] : '';

// Modify the query to include the search condition
$sql = "SELECT * FROM `users` 
        WHERE user_type = 'client' 
        AND (email LIKE '%$searchQuery%' OR 
             school_id LIKE '%$searchQuery%' OR 
             (SELECT CONCAT(first_name, ' ', last_name) FROM `client` WHERE `client`.`user_id` = `users`.`id`) LIKE '%$searchQuery%')";

$getusers = $conn->query($sql);

$results = [];
while ($row = $getusers->fetch_assoc()) {
    $id = $row['id'];
    $school_id = $row['school_id'];
    $email = $row['email'];
    if ($row['user_type'] == 'client') {
        $getClient = $conn->query('SELECT * FROM `client` WHERE `user_id` = "' . $id . '"');
        $client = $getClient->fetch_assoc();

        $fullname = $client['first_name'] . " " . $client['last_name'];
        $profile = $client['profile'];
        $status = $client['status'];

        $stats = ($status !== 'active') ? 'dead' : 'open';

        $pfp = empty($profile) ? "https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg" : 'img/profile/' . $profile;

        $results[] = [
            'id' => $id,
            'school_id' => $school_id,
            'fullname' => ucwords($fullname),
            'email' => $email,
            'status' => $status,
            'stats' => $stats,
            'profile' => $pfp
        ];
    }
}

echo json_encode($results);
?>
