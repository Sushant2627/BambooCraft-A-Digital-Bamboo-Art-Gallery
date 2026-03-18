<?php
session_start();
include('includes/dbconnection.php');

if (!isset($_POST['pid'])) {
    exit();
}

$pid = intval($_POST['pid']);

// Fetch product details
$query = mysqli_query(
    $con,
    "SELECT ID, Title, SellingPricing, Image 
     FROM tblartproduct 
     WHERE ID='$pid'"
);

$product = mysqli_fetch_assoc($query);

if (!$product) {
    exit();
}

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add / Update product
if (isset($_SESSION['cart'][$pid])) {
    $_SESSION['cart'][$pid]['qty'] += 1;
} else {
    $_SESSION['cart'][$pid] = [
        'id'    => $product['ID'],
        'title' => $product['Title'],
        'price' => $product['SellingPricing'],
        'image' => $product['Image'],
        'qty'   => 1
    ];
}

// Return updated cart count (AJAX response)
echo array_sum(array_column($_SESSION['cart'], 'qty'));
exit();
