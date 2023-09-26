<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$id = $_POST['id'];
$sql = "DELETE FROM usertable WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$response = array();
if ($stmt->execute()) {
  $response['success'] = true;
} else {
  $response['success'] = false;
}

echo json_encode($response);
