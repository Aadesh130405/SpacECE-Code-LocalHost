<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$data = json_decode(file_get_contents("php://input"), true);

echo json_encode(["status" => "success", "message" => "Progress updated"]);

mysqli_close($conn);
?>