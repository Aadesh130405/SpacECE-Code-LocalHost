<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$childId = $_GET['childId'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$query = "INSERT INTO child_growth (user_id, child_id, height, weight) 
          VALUES ('$userId', '$childId', '$height', '$weight')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success", "message" => "Growth updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Update failed"]);
}

mysqli_close($conn);
?>