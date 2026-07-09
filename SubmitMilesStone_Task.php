<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_POST['userId'];
$childId = $_POST['childId'];
$taskId = $_POST['taskId'];

echo json_encode(["status" => "success", "message" => "Milestone task submitted"]);

mysqli_close($conn);
?>