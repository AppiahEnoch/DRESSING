<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";
$usernameOrEmail = $_POST['usernameOrEmail'];
$password = $_POST['password'];

$sql = "SELECT * FROM usertable WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);

$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_level'] = $user['userlevel'];

    echo $_SESSION['user_level'];

} else {
    echo 0;
}
?>
