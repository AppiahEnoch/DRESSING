<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

header('Content-Type: application/json');

if (isset($_SESSION['ordered_product_ids']) && isset($_SESSION['productid'])) {
    $_SESSION['ordered_product_ids'] = [];
    $_SESSION['productid'] = null;
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}
?>
