<?php
// Require PHPMailer
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'mail.perkunasrt.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'no-reply@perkunasrt.com';
    $mail->Password   = 'BF@4i1%+KL3gsO4d';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('no-reply@perkunasrt.com', 'Website Contact');
    $mail->addAddress('benastenas9@gmail.com');

    // Email subject and body
    $mail->Subject = 'Test';
    $mail->Body    = 'Test body';
    $mail->isHTML(false);

    // Try sending
    if ($mail->send()) {
        echo "Mail sent.";
    } else {
        echo "Mail failed.";
    }
} catch (Exception $e) {
    echo "Mail failed: " . $mail->ErrorInfo;
}
