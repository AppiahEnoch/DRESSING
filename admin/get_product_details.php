<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

try {
    $selectedName = $_POST['productName'];
    
    $response = [];

    // Fetch product information
    $sqlProduct = "SELECT * FROM product WHERE name = ?";
    $stmtProduct = $conn->prepare($sqlProduct);
    $stmtProduct->bind_param("s", $selectedName);
    $stmtProduct->execute();
    $resultProduct = $stmtProduct->get_result();
    $productData = $resultProduct->fetch_assoc();

    if ($productData) {
        $response['product'] = $productData;
        
        // Fetch file information
        $productId = $productData['id'];
        $_SESSION['productid']=$productId;


        $sqlFile = "SELECT filepath FROM file WHERE productid = ?";
        $stmtFile = $conn->prepare($sqlFile);
        $stmtFile->bind_param("i", $productId);
        $stmtFile->execute();
        $resultFile = $stmtFile->get_result();

        $files = [];
        while ($row = $resultFile->fetch_assoc()) {
            $files[] = $row['filepath'];
        }
        $response['files'] = $files;
        
        echo json_encode(['status' => 'success', 'data' => $response]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No product found']);
    }

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
