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
$otp = $_POST['otp'];

$query = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    mysqli_query($conn, "UPDATE users SET is_verified=1 WHERE email='$email'");
    echo json_encode(["status" => "success", "message" => "Verification successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid OTP"]);
}

mysqli_close($conn);
?>