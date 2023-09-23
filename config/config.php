<?php
// BUSINESS SETTINGS



$email_sender="thedressing100@gmail.com";
$email_password="atuafwubqscqcepc";

$DBhostname = "localhost";
$DBusername = "root";
$DBpassword = "";
$database = "dressing";
$DBport = "63943";  

$conn ="";

//$remote_addr = $_SERVER['REMOTE_ADDR'];
// $remote_host = gethostbyaddr($remote_addr);

    try {
       $conn = mysqli_connect($DBhostname, $DBusername, $DBpassword, $database,$DBport) or die("Database connection failed");
 
    } catch (Throwable $th) {
        //throw $th;
    }





// remote server





