<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "Aadesh130405", "spacece");

$userId = $_GET['userId'];
$result = mysqli_query($conn, "SELECT * FROM children WHERE user_id='$userId'");

$children = [];
while ($row = mysqli_fetch_assoc($result)) {
    $children[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $children
]);

mysqli_close($conn);
?>