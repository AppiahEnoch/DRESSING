<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

$sql = "SELECT id, username, userlevel FROM usertable WHERE userlevel != 1";
$result = $conn->query($sql);
$users = array();

while ($row = $result->fetch_assoc()) {
  $users[] = $row;
}

echo json_encode($users);
