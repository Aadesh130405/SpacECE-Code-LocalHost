<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_POST['user_id'];
$childName = $_POST['childName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$center = $_POST['center'];

$query = "INSERT INTO children (user_id, child_name, dob, gender, center) 
          VALUES ('$userId', '$childName', '$dob', '$gender', '$center')";

if (mysqli_query($conn, $query)) {
    echo json_encode([
        "status" => "success",
        "message" => "Child added successfully",
        "data" => ["child_id" => mysqli_insert_id($conn)]
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to add child"]);
}

mysqli_close($conn);
?>