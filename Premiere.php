<?php
// Secure configurations
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Database connection setup
$servername = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'database';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// WhatsApp Integration
$whatsappApiUrl = 'https://api.whatsapp.com/send?text=';
$whatsappGroupLink = 'https://chat.whatsapp.com/JjAilDEf1RgKVFX1iWEJgx';

// Function to send message via WhatsApp
function sendWhatsAppMessage($message) {
    global $whatsappApiUrl, $whatsappGroupLink;
    $fullMessage = urlencode($message) . ' ' . $whatsappGroupLink;
    header('Location: ' . $whatsappApiUrl . $fullMessage);
    exit();
}

// Example usage:
sendWhatsAppMessage('Check out this new feature!');

// Include HTML output
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>New Features</title>
</head>
<body>
    <h1>Welcome to the Refactored Premiere Script</h1>
    <p>Enjoy the new features and integrations!</p>
</body>
</html>