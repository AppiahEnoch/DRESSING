<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$response = [];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM usertable WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $response = [
            "success" => true,
            "username" => $user['username'],
            "email" => $user['email'],
            // Assuming these fields exist in your table
            "country" => $user['country'],
            "total_orders" => $user['total_orders']
        ];
    } else {
        $response = ["success" => false, "error" => "User not found"];
    }
} else {
    $response = ["success" => false, "error" => "Not logged in"];
}

echo json_encode($response);
?>
