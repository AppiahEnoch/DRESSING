<?php
session_start();
require_once './vendor/autoload.php';
include "./config/config.php";
include "./config/settings.php";

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $_SESSION['productid'] = $productId;
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
