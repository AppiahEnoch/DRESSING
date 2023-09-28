<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if (isset($_POST['product_id'])) {
    $productIdToRemove = $_POST['product_id'];
    $orderedProductIds = $_SESSION['ordered_product_ids'] ?? [];
    $key = array_search($productIdToRemove, $orderedProductIds);

    if ($key !== false) {
        unset($orderedProductIds[$key]);
        $orderedProductIds = array_values($orderedProductIds);

        if (count($orderedProductIds) === 0) {
            unset($_SESSION['ordered_product_ids']);
            unset($_SESSION['productid']);
        } else {
            $_SESSION['ordered_product_ids'] = $orderedProductIds;
        }

        echo "success";
        exit;
    } else {
        echo "fail";
        exit;
    }
}
?>
