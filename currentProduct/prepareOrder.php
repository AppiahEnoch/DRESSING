<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$quantityMap = [];
$finalOrder = [];

// Generate unique session ID for this order
$orderSessionId = uniqid("order_", true);
$_SESSION['order_session_id'] = $orderSessionId;


// Initialize the quantity map
if (isset($_SESSION['ordered_product_ids'])) {
    foreach ($_SESSION['ordered_product_ids'] as $productId) {
        $quantityMap[$productId] = 0;
    }
}

// Update quantities from changed items
if (isset($_POST['changedItems'])) {
    $changedItems = json_decode($_POST['changedItems'], true);
    foreach ($changedItems as $item) {
        $productId = $item['productId'];
        $quantity = $item['quantity'];
        $quantityMap[$productId] = $quantity;
    }
}

// Fetch product details and populate finalOrder
foreach ($quantityMap as $productId => $quantity) {
    if ($quantity == 0) {
        $quantity = 1;
    }
    $sql = "SELECT product.*, product_category.category AS categoryName FROM product INNER JOIN product_category ON product.category = product_category.id WHERE product.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
  
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $productData = $result->fetch_assoc();
            $productData['quantity'] = $quantity;
            $productData['order_session_id'] = $orderSessionId;

            // Fetch file paths
            $fileSql = "SELECT filepath FROM file WHERE productid = ? group by productid order by productid asc";
            $fileStmt = $conn->prepare($fileSql);
            $fileStmt->bind_param('i', $productId);
            if ($fileStmt->execute()) {
                $fileResult = $fileStmt->get_result();
                $filePaths = [];
                while ($fileRow = $fileResult->fetch_assoc()) {
                    $filePaths[] = $fileRow['filepath'];
                }
                $productData['filepaths'] = $filePaths;
            }
            
            $finalOrder[] = $productData;
        }
    }
}

echo json_encode($finalOrder);
$_SESSION['user_order'] = json_encode($finalOrder);
?>
