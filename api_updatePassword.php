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
$newPassword = md5($_POST['password']);

$query = "UPDATE users SET password='$newPassword' WHERE email='$email'";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success", "message" => "Password updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Password update failed"]);
}

mysqli_close($conn);
?>