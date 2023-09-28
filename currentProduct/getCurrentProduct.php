<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$productId = $_SESSION['productid'];



$sql = "SELECT product.*, product_category.category AS categoryName
        FROM product
        INNER JOIN product_category ON product.category = product_category.id
        WHERE product.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $productId);

$productData = [];
$files = [];

if ($stmt->execute()) {
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $productData = $result->fetch_assoc();
  }
}

$fileSql = "SELECT filepath FROM file WHERE productid = ?";
$fileStmt = $conn->prepare($fileSql);
$fileStmt->bind_param('i', $productId);

if ($fileStmt->execute()) {
  $fileResult = $fileStmt->get_result();
  while ($row = $fileResult->fetch_assoc()) {
    $files[] = $row['filepath'];
  }
}

if (!empty($productData)) {
  $productData['filepath'] = $files;
  echo json_encode($productData);
} else {
  echo json_encode(null);
}
?>
