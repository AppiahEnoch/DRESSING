<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$id = $_POST['id'];
$newLevel = $_POST['newLevel'];

$sql = "UPDATE usertable SET userlevel = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $newLevel, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();
?>
