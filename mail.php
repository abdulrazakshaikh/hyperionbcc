<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer autoloader and other necessary files
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    $formcontent = "Name: $name \nContact No.: $phone \nSubject: $subject \nMessage: $message";
    $recipient = "email to received";
    $subject = "Enquiry - Website";

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output (set to 2 for more detailed debugging)
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.example.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'your_username@example.com';           // SMTP username
        $mail->Password   = 'your_smtp_password';                  // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        $mail->setFrom($email);
        $mail->addAddress($recipient);
        
        // Content
        $mail->isHTML(false);                                  // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body    = $formcontent;

        $mail->send();
        
        echo "<img src='https://img.icons8.com/dusk/100/000000/thumb-up.png'/>" . "<h2>Congratulations</h2>" . "<h2>Your Request has been sent Successfully</h2>";
    } catch (Exception $e) {
        echo "Error sending the email. Please check the error logs for more information.";
        error_log("Email sending failed: " . $mail->ErrorInfo);
    }
} else {
    echo "Invalid request method. Please use the form to submit data.";
}
?>
