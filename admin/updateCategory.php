<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newCategory = $_POST['newCategory'];

    $sql = "UPDATE product_category SET category=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newCategory, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
