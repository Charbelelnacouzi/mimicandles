<?php
session_start();

// Retrieve the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

// Store the cart data in the PHP session
$_SESSION['cart'] = $data;

// Respond with success
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>
