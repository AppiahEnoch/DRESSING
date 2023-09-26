<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

if (isset($_SESSION['user_level'])) {
  $response['user_level'] = $_SESSION['user_level'];
  echo json_encode($response);
} else {
  $response['user_level'] = 0;
  echo json_encode($response);
}
?>
