<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$response = [];

// Update your uploadImageWithUniqueName function like this
function uploadImageWithUniqueName($input_name, $index, $target_dir = "../productimage/") {
  if(isset($_FILES[$input_name]['name'][$index]) && $_FILES[$input_name]['error'][$index] == 0){
      $unique_id = bin2hex(openssl_random_pseudo_bytes(16));
      $unique_id = $unique_id . generateCode();
      $file_extension = pathinfo($_FILES[$input_name]["name"][$index], PATHINFO_EXTENSION);
      $new_filename = $unique_id . '.' . $file_extension;
      $new_file_path = $target_dir . $new_filename;

      if (move_uploaded_file($_FILES[$input_name]["tmp_name"][$index], $new_file_path)) {
          return $new_file_path;
      }
  }
  return false;
}

function generateCode() {
    $seed = md5(uniqid(mt_rand(), true));
    $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $charIndex = hexdec(substr($seed, $i, 1)) % $charactersLength;
        $randomString .= $characters[$charIndex];
    }
    return $randomString;
}

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productName = $_POST['productName'];
      // to uppercase
      $productName = strtoupper($productName);

      $productCategory = intval($_POST['productCategory']);
      $productPrice = floatval($_POST['productPrice']);
      $productSize = $_POST['productSize'];
      $productColor = $_POST['productColor'];
      $productColor = strtoupper($productColor);

      $acceptedCurrencies = $_POST['acceptedCurrencies'];
      $acceptedCurrencies = strtoupper($acceptedCurrencies);

      $sql = "INSERT INTO product (name, category, price, size, color, currency) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sidsss", $productName, $productCategory, $productPrice, $productSize, $productColor, $acceptedCurrencies);

      if($stmt->execute()) {
          $productId = $conn->insert_id;
          $total = count($_FILES['files']['name']);

          for ($i = 0; $i < $total; $i++) {
              $tmp_name = $_FILES['files']['tmp_name'][$i];
              if ($tmp_name != "") {
                  $uploadedPath = uploadImageWithUniqueName('files', $i, '../productimage/');
                  if ($uploadedPath !== false) {
                      $sqlFile = "INSERT INTO file (productid, filepath) VALUES (?, ?)";
                      $stmtFile = $conn->prepare($sqlFile);
                      $stmtFile->bind_param("is", $productId, $uploadedPath);
                      $stmtFile->execute();
                  }
              }
          }

          $response['status'] = "success";
      } else {
          if ($conn->errno == 1062) {
              $response['status'] = "error";
              $response['message'] = "Product already exists with the same name, use a different name.";
          } else {
              $response['status'] = "error";
              $response['message'] = $stmt->error;
          }
      }
  }
} catch (Exception $e) {
  $response['status'] = "error";
  $response['message'] = $e->getMessage();
} finally {
  echo json_encode($response);
}
?>

  
