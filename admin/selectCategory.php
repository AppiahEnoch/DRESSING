<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$sql = "SELECT * FROM product_category order by id desc";
$result = $conn->query($sql);

$categories = [];
while($row = $result->fetch_assoc()) {
    $categories[] = $row;
}
echo json_encode($categories);
