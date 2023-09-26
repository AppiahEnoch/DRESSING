<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if (isset($_SESSION['user_level']) && ($_SESSION['user_level'] == 2 || $_SESSION['user_level'] == 3)) {
  // User level is 2 or 3, proceed
} else {
  header("Location: ../index.php");
  exit();
}
?>
