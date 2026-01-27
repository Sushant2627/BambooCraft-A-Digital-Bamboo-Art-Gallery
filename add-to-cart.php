<?php
session_start();
include('includes/dbconnection.php');

if (!isset($_GET['pid'])) {
    header("Location: index.php");
    exit();
}

$pid = intval($_GET['pid']);

// Fetch product details
$query = mysqli_query($con, "SELECT ID, Title, SellingPricing, Image FROM tblartproduct WHERE ID='$pid'");
$product = mysqli_fetch_assoc($query);

if (!$product) {
    header("Location: index.php");
    exit();
}

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// If product already in cart → increase quantity
if (isset($_SESSION['cart'][$pid])) {
    $_SESSION['cart'][$pid]['qty'] += 1;
} else {
    $_SESSION['cart'][$pid] = array(
        'id'    => $product['ID'],
        'title' => $product['Title'],
        'price' => $product['SellingPricing'],
        'image' => $product['Image'],
        'qty'   => 1
    );
}

// Redirect to cart page
header("Location: cart.php");
exit();
?>
