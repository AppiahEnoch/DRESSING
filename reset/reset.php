<?php
include "../config/config.php";
include "../config/settings.php";

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get the input data from the POST request
    $indexnumber = $_POST['indexnumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password using the default algorithm
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE `registration` SET `username` = ?, `password` = ? WHERE `id` = ?");

    // Bind the parameters
    $stmt->bind_param("sss", $username, $hashedPassword, $indexnumber);

    // Execute the statement
    if ($stmt->execute()) {
        // Success
        echo "Username and password updated successfully.";
    } else {
        // Error
        echo "Error updating username and password: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
} else {
    // Wrong request method
    echo "Only POST requests are allowed.";
}
?>
