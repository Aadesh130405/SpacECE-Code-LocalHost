<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$childId = $_GET['childId'];

$result = mysqli_query($conn, "SELECT * FROM milestone_tasks WHERE user_id='$userId' AND child_id='$childId'");

$tasks = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tasks[] = $row;
}

echo json_encode(["status" => "success", "data" => $tasks]);

mysqli_close($conn);
?>