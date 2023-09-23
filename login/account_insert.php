<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usertable (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $username, $email, $hashed_password);

if (!$stmt->execute()) {
    if (strpos($stmt->error, 'username') !== false) {
        echo json_encode(['error' => 'Username already taken']);
    } elseif (strpos($stmt->error, 'email') !== false) {
        echo json_encode(['error' => 'Email already taken']);
    }
} else {
    echo json_encode(['success' => 'User successfully registered']);
}
?>
