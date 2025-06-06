<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'mail.crystalpipshub.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'solomonleke@crystalpipshub.com'; // Your email
        $mail->Password   = 'crystalpipshub@1234';     // ⚠️ Replace with actual email password
        $mail->SMTPSecure = 'ssl'; // or use 'tls' if 465 doesn't work
        $mail->Port       = 465;

        // Email content
        $mail->setFrom('solomonleke@crystalpipshub.com', 'Website Contact Form');
        $mail->addAddress('solomonleke@crystalpipshub.com'); // Recipient (your email again)

        $mail->addReplyTo($email, $name); // Optional: allows you to reply to sender

        $mail->Subject = "New Contact Form Message";
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'error: ' . $mail->ErrorInfo;
    }
}
?>
