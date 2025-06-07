<?php
// Enable error reporting for debugging (remove or comment out in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log that the script started
file_put_contents(__DIR__ . "/test_log.txt", date('Y-m-d H:i:s') . " - Script started\n", FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Log that POST was received
    file_put_contents(__DIR__ . "/test_log.txt", date('Y-m-d H:i:s') . " - POST received\n", FILE_APPEND);

    // Sanitize and fetch inputs
    $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $message = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);
    $reason = filter_var($_POST['reason'] ?? '', FILTER_SANITIZE_STRING);

    if (!$email) {
        http_response_code(400);
        echo "Invalid email.";
        exit;
    }

    // Prepare email details
    $to = "benastenas9@gmail.com";  // Change to your actual recipient email address
    $subject = "Nauja žinutė iš kontaktų formos: $reason";
    $body = "Vardas: $name\n";
    $body .= "El. Paštas: $email\n";
    $body .= "Tema: $reason\n\n";
    $body .= "Žinutė:\n$message\n";

    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Attempt to send the email
    $mailResult = mail($to, $subject, $body, $headers);

    // Log mail result
    file_put_contents(__DIR__ . "/mail_log.txt", date('Y-m-d H:i:s') . " - to: $to, subject: $subject, result: " . ($mailResult ? "success" : "failure") . "\n", FILE_APPEND);

    if ($mailResult) {
        http_response_code(200);
        echo "Message sent successfully.";
    } else {
        http_response_code(500);
        echo "Failed to send message.";
    }
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>
