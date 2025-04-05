<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gro");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Example cart logic (using session or insert into cart table)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart (can be improved with quantity check, etc.)
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }

    // Redirect back to testing.php
    header("Location: testing.php?added=1");
    exit();
}
?>
