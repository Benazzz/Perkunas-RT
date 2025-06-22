<?php
// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'mail.perkunasrt.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'no-reply@perkunasrt.com';  // Your SMTP username
    $mail->Password   = 'BF@4i1%+KL3gsO4d';        // Your SMTP password
    $mail->SMTPSecure = 'tls';                      // Encryption (ssl/tls)
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('no-reply@perkunasrt.com', 'Website Contact');
    $mail->addAddress('benastenas9@gmail.com');    // Your email to receive the test

    // Email subject and body
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent using PHPMailer.';

    $mail->isHTML(false);

    // Send the email
    $mail->send();
    echo "Mail sent successfully!";
} catch (Exception $e) {
    echo "Mail could not be sent. PHPMailer Error: " . $mail->ErrorInfo;
}
