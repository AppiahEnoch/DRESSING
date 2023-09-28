<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

// Initialize the session array for ordered product IDs
if (!isset($_SESSION['ordered_product_ids'])) {
    $_SESSION['ordered_product_ids'] = [];
}


// Add the current product ID to the session array
$currentProductId = $_SESSION['productid'];



//echo $currentProductId;
if (!in_array($currentProductId, $_SESSION['ordered_product_ids'])) {
    $_SESSION['ordered_product_ids'][] = $currentProductId;
}

// Echo all the product IDs in the session array
//echo implode(', ', $_SESSION['ordered_product_ids']);


$cartItems = [];

// Loop through all product IDs stored in session ordered_product_ids
foreach ($_SESSION['ordered_product_ids'] as $productId) {
    $sql = "SELECT product.*, product_category.category AS categoryName
            FROM product
            INNER JOIN product_category ON product.category = product_category.id
            WHERE product.id = ? order by product.id asc";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
  
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $productData = $result->fetch_assoc();
        }
    }

    $fileSql = "SELECT productid, MIN(filepath) as filepath FROM file WHERE productid = ? GROUP BY productid ORDER BY productid ASC";

    $fileStmt = $conn->prepare($fileSql);

    $allFiles = [];
  
    // Loop through each product ID to get all file paths
    foreach ($_SESSION['ordered_product_ids'] as $id) {
        $fileStmt->bind_param('i', $id);
        if ($fileStmt->execute()) {
            $fileResult = $fileStmt->get_result();
            while ($row = $fileResult->fetch_assoc()) {
                $allFiles[] = $row['filepath'];
            }
        }
    }
  
    if (!empty($productData)) {
        $productData['filepaths'] = $allFiles;
        $cartItems[] = $productData;
    }
}

$b = $_SESSION['ordered_product_ids'];
echo json_encode($cartItems);
//echo json_encode($_SESSION['ordered_product_ids']);
?>
