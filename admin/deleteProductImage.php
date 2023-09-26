
<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

try {
    $productId = $_SESSION['productid'];
    $filepath = $_POST['filepath'];

    // Delete file
    $sql = "DELETE FROM file WHERE productid = ? AND filepath = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $productId, $filepath);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Delete the actual file
        unlink($filepath);
        echo json_encode(['status' => 'success', 'message' => 'File deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File could not be deleted']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
