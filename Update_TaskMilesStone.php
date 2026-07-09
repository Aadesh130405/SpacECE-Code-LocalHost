<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$childId = $_GET['childId'];
$data = json_decode(file_get_contents("php://input"), true);
$taskId = $data['taskId'];
$status = $data['status'];

if (mysqli_query($conn, "UPDATE milestone_tasks SET task_status='$status' WHERE id='$taskId'")) {
    echo json_encode(["status" => "success", "message" => "Task updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Update failed"]);
}

mysqli_close($conn);
?>