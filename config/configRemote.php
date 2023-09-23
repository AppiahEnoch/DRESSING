<?php
// BUSINESS SETTINGS



$email_sender="aamustedirb@gmail.com";
$email_password="ycmeexpqyaqposfz";

$DBhostname = "localhost";
$DBusername = "AECleanCodes";
$DBpassword = "Encapsulation419@";
$database = "crystao1__irb";
$DBport = "63943";  



$conn ="";

//$remote_addr = $_SERVER['REMOTE_ADDR'];
// $remote_host = gethostbyaddr($remote_addr);

    try {
       $conn = mysqli_connect($DBhostname, $DBusername, $DBpassword, $database) or die("Database connection failed");
 
    } catch (Throwable $th) {
        //throw $th;
    }





// remote server





