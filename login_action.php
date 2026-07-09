<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "Aadesh130405";        // your MySQL password
$database = "spacece";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Connection failed"]);
    exit;
}

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // echo json_encode([
    //     "status" => "success",
    //     "message" => "Login successful",
    //     "data" => [
    //         "current_user_id" => $user['id'],
    //         "current_user_name" => $user['name'],
    //         "current_user_mob" => "",
    //         "current_user_type" => "customer",
    //         "current_user_image" => "",
    //         "consultant_category" => "",
    //         "consultant_office" => "",
    //         "consultant_from_time" => "",
    //         "consultant_to_time" => "",
    //         "consultant_language" => "",
    //         "consultant_fee" => "",
    //         "consultant_qualification" => ""
    //     ]
    // ]);
    echo json_encode([
    "status" => "success",
    "message" => "Login successful",
    "data" => [
        "current_user_id" => $user['id'],
        "current_user_name" => $user['name'],
        "current_user_mob" => "",
        "current_user_type" => "customer",
        "current_user_image" => "",
        "current_user_email" => $user['email'],
        "token" => md5($user['email'] . time()),
        "consultant_category" => "",
        "consultant_office" => "",
        "consultant_from_time" => "",
        "consultant_to_time" => "",
        "consultant_language" => "",
        "consultant_fee" => "",
        "consultant_qualification" => ""
    ]
]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid email or password"]);
}

mysqli_close($conn);
?>