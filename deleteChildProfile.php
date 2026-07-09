<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$childId = $_GET['childId'];

if (mysqli_query($conn, "DELETE FROM children WHERE id='$childId' AND user_id='$userId'")) {
    echo json_encode(["status" => "success", "message" => "Child deleted"]);
} else {
    echo json_encode(["status" => "error", "message" => "Delete failed"]);
}

mysqli_close($conn);
?>