<?php
session_start();
//$_SESSION['email']="prignutt@gmail.com";
$email = $_SESSION['email'];
// Include the necessary files for the connection
include "../config/config.php";
include "../config/settings.php";

// Prepare the query to select indexnumber using the given email
$query = "SELECT `indexnumber` FROM `intern` WHERE `email` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);

// Execute the query
$stmt->execute();

// Bind the result to the variable
$stmt->bind_result($indexnumber);

// Fetch the result
if ($stmt->fetch()) {
    // You can now use $indexnumber for whatever you need
    echo  $indexnumber;
} else {
    echo 0;
}

// Close the statement
$stmt->close();

// Optionally close the connection
//$conn->close();
?>
