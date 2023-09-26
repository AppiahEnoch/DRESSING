<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['productName'];
    // to uppercase
    $category = strtoupper($category);

    $sql = "INSERT INTO product_category (category) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
