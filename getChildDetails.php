<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$childId = $_GET['childId'];

$result = mysqli_query($conn, "SELECT * FROM children WHERE id='$childId' AND user_id='$userId'");

if (mysqli_num_rows($result) > 0) {
    $child = mysqli_fetch_assoc($result);
    echo json_encode(["status" => "success", "data" => $child]);
} else {
    echo json_encode(["status" => "error", "message" => "Child not found"]);
}

mysqli_close($conn);
?>