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

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : 'customer';

$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(["status" => "error", "message" => "Email already exists"]);
    exit;
}

$otp = rand(100000, 999999);

$query = "INSERT INTO users (name, email, password, otp) VALUES ('$name', '$email', '$password', '$otp')";

if (mysqli_query($conn, $query)) {
    echo json_encode([
    "status" => "success",
    "message" => "Registration successful",
    "data" => [
        "current_user_id" => mysqli_insert_id($conn),
        "current_user_name" => $name,
        "current_user_mob" => $phone,
        "current_user_type" => $type,
        "current_user_image" => ""
    ]
]);
} else {
    echo json_encode(["status" => "error", "message" => "Registration failed"]);
}

mysqli_close($conn);
?>