<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$adminLevel = $_POST['adminLevel'];

$sql = "INSERT INTO usertable (username, email, mobile, password, userlevel, recdate) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $username, $email, $mobile, $password, $adminLevel);

$response = array();
if ($stmt->execute()) {
  $response['success'] = true;
} else {
  $response['success'] = false;
  if ($stmt->errno == 1062) {
    $error = $stmt->error;
    if (strpos($error, 'username') !== false) {
      $response['error'] = "Username already exists.";
    } else if (strpos($error, 'email') !== false) {
      $response['error'] = "Email already exists.";
    } else {
      $response['error'] = "Duplicate entry.";
    }
  } else {
    $response['error'] = "Could not register the admin.";
  }
}

echo json_encode($response);
?>
