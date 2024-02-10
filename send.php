<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    try {
        // Instantiate PHPMailer
        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'charbelnakouzi.cn@gmail.com';
        $mail->Password = 'tepk hvzu cypz eduh';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Get form data
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $subject = isset($_POST["Subject"]) ? $_POST["Subject"] : '';
        $phoneNumber = isset($_POST["phone"]) ? $_POST["phone"] : '';
        $message = isset($_POST["message"]) ? $_POST["message"] : '';
        $senderEmail = 'your_desired_email@example.com';


        // Set sender (From) email address from form data
        $mail->setFrom($senderEmail, $name);

        // Set fixed recipient (To) email address
        $fixedRecipientEmail = 'mememe168@outlook.com';
        $mail->addAddress($fixedRecipientEmail);

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name<br>Phone Number: $phoneNumber<br><br>Message: $message";

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Debugoutput = function ($str, $level) {
    error_log("SMTP: $str");
};
        $mail->send();
        echo "<script>alert('Thank you for contacting us! We will be in touch with you soon.');</script>";
        // Redirect after successful send
        header('Location: contact.php');
        exit();
       
 } catch (Exception $e) {
        // Handle exceptions, e.g., log the error
        error_log("Email send error: " . $e->getMessage(), 0);
        echo "Mailer Error: " . $e->getMessage();
    }}
?>
