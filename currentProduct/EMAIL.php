<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";
include "../config/settings.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer;
    $emailToCheck = $_POST['email'];
    $message = $_POST['message'];

    $receiver = $admin_email_address;

    $sql = "SELECT id, username, email FROM usertable WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $emailToCheck);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['error' => 'Email does not exist']);
        exit();
    }

    $row = $result->fetch_assoc();
    $name = $row['username'];

    $settings = [
        'sender' => $email_sender,
        'password' => $email_password,
        'receiver' => $receiver, // replace this with shop owner's email
        'subject' => "New Customer Message",
        'host' => "smtp.gmail.com",
        'port' => "25"
    ];

    $htmlFile = "CMAIL.html";
    if (!file_exists($htmlFile)) {
        die($htmlFile . " does not exist");
    } else {
        $html = file_get_contents($htmlFile);
    }

    $curyear = date('Y');
    $html = str_replace('{{customer_email}}', $emailToCheck, $html);
    $html = str_replace('{{customer_message}}', $message, $html);
    $html = str_replace('{{current_year}}', $curyear, $html);

    $mail->isSMTP();
    $mail->Host = $settings['host'];
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = $settings['port'];
    $mail->Username = $settings['sender'];
    $mail->Password = $settings['password'];
    $mail->addAddress($settings['receiver']);
    $mail->Subject = $settings['subject'];
    $mail->msgHTML($html);

    if (!$mail->send()) {
        echo json_encode(['error' => $mail->ErrorInfo]);
        exit();
    } else {
        echo 1;
        exit;
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    exit();
}
?>
