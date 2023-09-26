<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

function uploadImageWithUniqueName($input_name, $target_dir = "../productimage/") {
    if(isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0){
        $unique_id = bin2hex(openssl_random_pseudo_bytes(16));
        $unique_id = $unique_id . generateCode();
        $file_extension = pathinfo($_FILES[$input_name]["name"], PATHINFO_EXTENSION);
        $new_filename = $unique_id . '.' . $file_extension;
        $new_file_path = $target_dir . $new_filename;
        if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $new_file_path)) {
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
    $oldFilePath = $_POST['oldFilePath'];
    $productId = $_SESSION['productid'];
    $newFilePath = uploadImageWithUniqueName('file');

    if ($newFilePath) {
        // Delete old file from disk
        unlink($oldFilePath);

        // Update database record
        $sql = "UPDATE file SET filepath = ? WHERE filepath = ? AND productid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $newFilePath, $oldFilePath, $productId);
        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'Image updated successfully', 'newFilePath' => $newFilePath]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Image update failed']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
