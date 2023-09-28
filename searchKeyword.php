<?php
session_start();
require_once './vendor/autoload.php';
include "./config/config.php";
include "./config/settings.php";

$keyword = isset($_POST['keyword']) ? $conn->real_escape_string($_POST['keyword']) : '';

$sql = "SELECT product.*, product_category.category AS categoryName, file.filepath AS filepath
        FROM product
        INNER JOIN product_category ON product.category = product_category.id
        LEFT JOIN file ON product.id = file.productid
        WHERE product.name LIKE '%$keyword%' 
        OR product_category.category LIKE '%$keyword%' 
        OR product.price LIKE '%$keyword%'
        OR product.size LIKE '%$keyword%'
        ORDER BY product_category.category, product.name";

$result = $conn->query($sql);
$products = [];
$current_category = "";
$category_count = [];
$unique_product_ids = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($current_category != $row['categoryName']) {
            $current_category = $row['categoryName'];
            $category_count[$current_category] = 0;
            $unique_product_ids[$current_category] = [];
        }
        if (!in_array($row['id'], $unique_product_ids[$current_category])) {
            $category_count[$current_category]++;
            $unique_product_ids[$current_category][] = $row['id'];
        }
        $products[$current_category][] = $row;
    }
}

foreach ($category_count as $category => $count) {
    $new_category_name = $category . ' ' . $count . ' products in this category';
    $products[$new_category_name] = $products[$category];
    unset($products[$category]);
}

echo json_encode($products);
