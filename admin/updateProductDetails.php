<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$id = $_SESSION['productid'];
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$size = $_POST['size'];
$color = $_POST['color'];
$currency = $_POST['currency'];

$stmt = $conn->prepare("UPDATE product SET  `name`=?, category=?, price=?, `size`=?, color=?, currency=? WHERE id=?");
$stmt->bind_param("sidsssi", $name, $category, $price, $size, $color, $currency, $id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}

