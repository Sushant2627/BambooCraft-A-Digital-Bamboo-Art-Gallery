<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

/* ======================
   INCREASE QUANTITY
====================== */
if (isset($_GET['inc'])) {
    $pid = intval($_GET['inc']);

    if (isset($_SESSION['cart'][$pid])) {
        $_SESSION['cart'][$pid]['qty'] += 1;
    }

    header("Location: cart.php");
    exit();
}

/* ======================
   DECREASE QUANTITY
====================== */
if (isset($_GET['dec'])) {
    $pid = intval($_GET['dec']);

    if (isset($_SESSION['cart'][$pid])) {
        if ($_SESSION['cart'][$pid]['qty'] > 1) {
            $_SESSION['cart'][$pid]['qty'] -= 1;
        } else {
            unset($_SESSION['cart'][$pid]); // remove if qty = 1
        }
    }

    header("Location: cart.php");
    exit();
}

/* ======================
   REMOVE PRODUCT
====================== */
if (isset($_GET['remove'])) {
    $pid = intval($_GET['remove']);
    unset($_SESSION['cart'][$pid]);
    header("Location: cart.php");
    exit();
}


/* ======================
   CHECKOUT PROCESS
====================== */
if (isset($_POST['checkout'])) {

    if (!isset($_SESSION['userid'])) {
        echo "<script>alert('Please login first');location='login.php'</script>";
        exit();
    }

    if (empty($_SESSION['cart'])) {
        echo "<script>alert('Cart is empty');</script>";
        exit();
    }

    $userid = $_SESSION['userid'];
    $orderNumber = rand(100000000, 999999999);

    $success = true; // track insert status

   foreach ($_SESSION['cart'] as $item) {

    $productID = $item['id'];      // IMPORTANT
    $quantity  = $item['qty'];     // IMPORTANT
    $price     = $item['price'];
    $total     = $price * $quantity;

    $insert = mysqli_query($con,
        "INSERT INTO tblorders 
        (UserID, OrderNumber, ProductID, Quantity, TotalAmount, OrderStatus) 
        VALUES 
        ('$userid','$orderNumber','$productID','$quantity','$total','Pending')"
    );

    if(!$insert){
        die(mysqli_error($con));
    }
}


    if ($success) {
        unset($_SESSION['cart']);
        echo "<script>
            alert('Order placed successfully!');
            location='orders.php';
        </script>";
    } else {
        echo "<script>alert('Order failed');</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BambooCraft – A Digital Bamboo Art Gallery | Cart</title>

     <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

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
            <th>Product Name</th>
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
<td class="text-center">
    <a href="cart.php?dec=<?php echo $item['id']; ?>"
       class="btn btn-sm btn-warning">−</a>

    <strong class="mx-2"><?php echo $item['qty']; ?></strong>

    <a href="cart.php?inc=<?php echo $item['id']; ?>"
       class="btn btn-sm btn-success">+</a>
</td>
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

    <!-- CHECKOUT BUTTON -->
    <form method="post" style="display:inline;">
        <button type="submit" name="checkout" class="btn btn-success">
            Checkout
        </button>
    </form>
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