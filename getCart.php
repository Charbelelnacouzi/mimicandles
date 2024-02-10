<?php
session_start();

// Retrieve cart data from the PHP session
$cartData = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

header('Content-Type: application/json');
if (isset($_SESSION['cart'])) {
    echo json_encode(['cart' => $_SESSION['cart']]);
} else {
    echo json_encode(['error' => 'Cart not found in session']);
}
?>