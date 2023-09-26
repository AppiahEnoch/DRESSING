<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$productId = $_SESSION['productid'];

// Fetch file paths before deleting product
$sqlFetchFiles = "SELECT filepath FROM file WHERE productid = ?";
$stmtFetchFiles = $conn->prepare($sqlFetchFiles);
$stmtFetchFiles->bind_param("i", $productId);

if ($stmtFetchFiles->execute()) {
  $result = $stmtFetchFiles->get_result();
  while ($row = $result->fetch_assoc()) {
    $filePath =  $row['filepath'];
    if (file_exists($filePath)) {
      unlink($filePath);
    }
  }
}

$sql = "DELETE FROM product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);

$response = array();
if ($stmt->execute()) {
  $response['success'] = true;
} else {
  $response['success'] = false;
  $response['error'] = "Could not delete the product.";
}

echo json_encode($response);
?>
