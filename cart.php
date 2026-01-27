<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Remove item
if (isset($_GET['remove'])) {
    $rid = intval($_GET['remove']);
    unset($_SESSION['cart'][$rid]);
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bamboo Art Gallery | Cart</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .cart-table img {
            width: 80px;
            border-radius: 5px;
        }
        .cart-total {
            font-size: 20px;
            font-weight: bold;
        }
        .btn-remove {
            background: #dc3545;
            color: white;
        }
        .btn-remove:hover {
            background: #b02a37;
            color: white;
        }
    </style>
</head>

<body>
<?php include('includes/header.php'); ?>

<div class="inner_page-banner one-img"></div>

<div class="using-border py-3">
    <div class="inner_breadcrumb ml-4">
        <ul class="short_ls">
            <li><a href="index.php">Home</a><span>/ /</span></li>
            <li>Shopping Cart</li>
        </ul>
    </div>
</div>

<section class="banner-bottom py-5">
<div class="container">
<h3 class="text-center mb-4">🛒 Your Cart</h3>

<?php if (!empty($_SESSION['cart'])) { ?>
<table class="table table-bordered cart-table">
    <thead class="thead-dark">
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price (₹)</th>
            <th>Qty</th>
            <th>Total (₹)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $grandTotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total = $item['price'] * $item['qty'];
        $grandTotal += $total;
    ?>
        <tr>
            <td><img src="images/<?php echo $item['image']; ?>"></td>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['qty']; ?></td>
            <td><?php echo $total; ?></td>
            <td>
                <a href="cart.php?remove=<?php echo $item['id']; ?>" 
                   class="btn btn-sm btn-remove">
                   Remove
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div class="text-right cart-total">
    Grand Total: ₹<?php echo $grandTotal; ?>
</div>

<div class="text-right mt-3">
    <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
    <a href="#" class="btn btn-success">Checkout</a>
</div>

<?php } else { ?>
    <div class="alert alert-info text-center">
        Your cart is empty 🛒
    </div>
<?php } ?>

</div>
</section>

<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
