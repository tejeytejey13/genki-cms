<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0"> -->
    <title>Genki School Clinic Management System</title>
    <link rel="shortcut icon" href="./img/assets/PNJK PNG.png" />

    <!-- Bulma is included -->
    <link rel="stylesheet" href="./css/main.min.css?ver=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/404.css?ver=1.1">
    <link rel="stylesheet" href="./css/modal.css?ver=1.1">
    <link rel="stylesheet" href="./css/about.css?ver=1.1">
    <link rel="stylesheet" href="./css/calendar.css?ver=1.0">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
include('backend/config.php');
// session_start();
 $user_type = $_SESSION['user_type'];
 $user_id = $_SESSION['user_id'];

$getSql = "SELECT * FROM users WHERE id = '$user_id'";
$getQuery = mysqli_query($conn, $getSql);
$getrow = mysqli_fetch_assoc($getQuery);
$user_email = $getrow['email'];

if ($user_type == 'client') {
    $sqlclient = "SELECT * FROM client WHERE user_id = '$user_id'";
    $queryclient = mysqli_query($conn, $sqlclient);
    $row = mysqli_fetch_array($queryclient);
    $user_fname = $row['first_name'];
    $user_mname = $row['middle_initial'];
    $user_lname = $row['last_name'];
} else if ($user_type == 'nurse') {
    $sql = "SELECT * FROM nurse WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $user_fname = $row['first_name'];
    $user_mname = $row['middle_initial'];
    $user_lname = $row['last_name'];
} else if ($user_type == 'admin') {
    $sql = "SELECT * FROM admin WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $user_fname = $row['first_name'];
    $user_mname = $row['middle_initial'];
    $user_lname = $row['last_name'];
} else {
 
    header('Location: ../index.php');
    die("User not found");
}



?>

