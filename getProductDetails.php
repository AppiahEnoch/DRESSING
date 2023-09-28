<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if(isset($_POST['productId'])) {
  $productId = $_POST['productId'];
  
  $sql = "SELECT product.*, product_category.category AS categoryName, file.filepath AS filepath 
          FROM product 
          INNER JOIN product_category ON product.category = product_category.id
          LEFT JOIN file ON product.id = file.productid
          WHERE product.id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $productId);
  
  if($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo json_encode($row);
    } else {
      echo json_encode(null);
    }
  } else {
    echo json_encode(null);
  }
} else {
  echo json_encode(null);
}
?>
