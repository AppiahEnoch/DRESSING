<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$keyword = $_POST['keyword'];
$sql = "SELECT name FROM product WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$likeKeyword = "%" . $keyword . "%";
$stmt->bind_param("s", $likeKeyword);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        array_push($suggestions, $row['name']);
    }
    echo json_encode($suggestions);
} else {
    echo json_encode([]);
}
?>
