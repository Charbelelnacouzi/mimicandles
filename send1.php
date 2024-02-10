<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    try {
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
        $address = isset($_POST["address"]) ? $_POST["address"] : '';
        $phoneNumber = isset($_POST["phone"]) ? $_POST["phone"] : '';
        $cartItems = isset($_POST["cartItems"]) ? json_decode($_POST["cartItems"], true) : [];

        // Set sender (From) email address from form data
        $senderEmail = 'your_desired_email@example.com';
        $mail->setFrom($senderEmail, $name);

        // Set fixed recipient (To) email address
        $fixedRecipientEmail = 'mememe168@outlook.com';
        $mail->addAddress($fixedRecipientEmail);

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = 'Delivery Information';

        // Build the email body with customer details and cart items
        $emailBody = "Name: $name<br>Phone Number: $phoneNumber<br>Address: $address<br><br>";

        $emailBody .= "<h3>Ordered Items:</h3>";
        foreach ($cartItems as $item) {
            $productName = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $totalPrice = $quantity * $price;

            $emailBody .= "Product: $productName<br>Quantity: $quantity<br>Price: $price<br>Total Price: $totalPrice<br><br>";
        }

        $mail->Body = $emailBody;

        // SMTP debugging
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Debugoutput = function ($str, $level) {
            error_log("SMTP: $str");
        };

        // Send the email
        $mail->send();

        // Clear and reset the cart items in localStorage and HTML
        echo '<script>';
        echo 'localStorage.removeItem("cart");'; // Remove the cart items from localStorage
        echo 'document.getElementById("cartItemsInput").value = "";'; // Clear the hidden input field value
        echo 'document.getElementById("cartItems").innerHTML = "";'; // Clear the cart items displayed in the HTML
        echo '</script>';

        // Output a response
        echo "Email sent successfully.";
        echo '<script>alert("Thank you for choosing mimicandles! Your order has been submitted.");';
        echo 'window.location.href="index.html";</script>';

        exit();
    } catch (Exception $e) {
        // Handle exceptions, e.g., log the error
        error_log("Email send error: " . $e->getMessage(), 0);
        echo "Mailer Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
