<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Please login first');location='login.php'</script>";
    exit();
}

$userid = $_SESSION['userid'];
// Handle order cancellation
if (isset($_GET['cancel']) && isset($_GET['orderid'])) {

    $orderid = intval($_GET['orderid']);

    // Check if order belongs to user
    $check = mysqli_fetch_assoc(mysqli_query($con,
        "SELECT OrderStatus, CancelledBy 
         FROM tblorders 
         WHERE ID='$orderid' AND UserID='$userid'"
    ));

    if ($check && $check['OrderStatus'] == 'Pending') {

        mysqli_query($con,
            "UPDATE tblorders 
             SET OrderStatus='Cancelled',
                 CancelledBy='User'
             WHERE ID='$orderid' AND UserID='$userid'"
        );

        echo "<script>alert('Order cancelled successfully');location='orders.php';</script>";
        exit();

    } else {

        echo "<script>alert('Only pending orders can be cancelled');location='orders.php';</script>";
        exit();
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>BambooCraft – A Digital Bamboo Art Gallery | My Orders</title>

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
</head>

<body>

<?php include('includes/header.php'); ?>

<!-- Page Banner -->
<div class="inner_page-banner one-img"></div>

<!-- Breadcrumb -->
<div class="using-border py-3">
    <div class="inner_breadcrumb ml-4">
        <ul class="short_ls">
            <li><a href="index.php">Home</a><span>/ /</span></li>
            <li>My Orders</li>
        </ul>
    </div>
</div>

<!-- Orders Section -->
<section class="banner-bottom py-5">
<div class="container">
<h3 class="text-center mb-4">📦 My Orders</h3>

<?php if (!empty($_SESSION['orders']))  ?>
<table class="table table-bordered cart-table">
    <thead class="thead-dark">
<tr>
    <th>No.</th>
    <th>Product Name</th>
<th>Quantity</th>
<th>Total </th>
<th>Status</th>
    <th>Order Date</th>
    <th>Details</th> <!-- NEW -->
</tr>
</thead>


<tbody>
<?php
$query = mysqli_query($con,
    "SELECT tblorders.*, 
    tblartproduct.Image,
       tblartproduct.Title,
       tblusers.FullName,
       tblusers.MobileNumber,
       tblusers.Address,
       tblusers.City,
       tblusers.State,
       tblusers.Pincode

     FROM tblorders
     JOIN tblartproduct 
        ON tblorders.ProductID = tblartproduct.ID
     JOIN tblusers
        ON tblorders.UserID = tblusers.ID
     WHERE tblorders.UserID='$userid'
     ORDER BY tblorders.ID DESC"
);



$cnt = 1;

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {

        $status = $row['OrderStatus'];
?>
<tr>
    <td><?php echo $cnt++; ?></td>
<td>
    <div style="display:flex; align-items:center; gap:10px;">
        <img src="images/<?php echo $row['Image']; ?>" width="60" height="60" style="object-fit:cover; border-radius:6px;">
        <strong><?php echo $row['Title']; ?></strong>
    </div>
</td>
<td><?php echo $row['Quantity']; ?></td>
<td><strong>₹<?php echo $row['TotalAmount']; ?></strong></td>


    <td>
        <?php
        if($status == "Pending"){
            echo '<span class="badge bg-warning text-dark px-3 py-2">Pending</span>';
        } elseif($status == "Shipped"){
            echo '<span class="badge bg-info text-dark px-3 py-2">Shipped</span>';
        } elseif($status == "Delivered"){
            echo '<span class="badge bg-success px-3 py-2">Delivered</span>';
        } elseif($status == "Cancelled"){
            echo '<span class="badge bg-danger px-3 py-2">Cancelled</span>';
        } else {
            echo '<span class="badge bg-secondary px-3 py-2">'.$status.'</span>';
        }
        ?>
    </td>

    <td><?php echo date("d M Y", strtotime($row['OrderDate'])); ?></td>

<td><button class="btn btn-sm btn-outline-dark toggle-btn"
    data-toggle="collapse"
    data-target="#details<?php echo $row['ID']; ?>"
    data-id="<?php echo $row['ID']; ?>">
    View Details
</button></td>

</tr>

<!-- Expandable Row -->
<tr class="collapse bg-light" id="details<?php echo $row['ID']; ?>">
    <td colspan="7">
        <div class="p-4 text-left">

            <!-- PRODUCT DETAILS -->
            <h6 class="mb-3"><strong>Product Details</strong></h6>

            <p><strong>Product:</strong> <?php echo $row['Title']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $row['Quantity']; ?></p>
            <p><strong>Total:</strong> ₹<?php echo $row['TotalAmount']; ?></p>
            <p><strong>Status:</strong> <?php echo $row['OrderStatus']; ?></p>
            <p><strong>Order Date:</strong> <?php echo date("d M Y", strtotime($row['OrderDate'])); ?></p>

            <?php if(isset($row['PaymentMethod'])) { ?>
                <p><strong>Payment Method:</strong> <?php echo $row['PaymentMethod']; ?></p>
            <?php } ?>

            <hr>

            <!-- DELIVERY ADDRESS -->
            <h6 class="mt-3 mb-2"><strong>Delivery Address</strong></h6>

            <p><strong>Name:</strong> <?php echo $row['FullName']; ?></p>
<p>
<strong>Address:</strong> 
<?php 
echo $row['Address'] . ', ' . 
     $row['City'] . ', ' . 
     $row['State'] . ' - ' . 
     $row['Pincode']; 
?>
</p>
            <p><strong>Mobile:</strong> <?php echo $row['MobileNumber']; ?></p>

        </div>
        <?php if($row['OrderStatus'] == "Pending"){ ?>
    <a href="orders.php?cancel=1&orderid=<?php echo $row['ID']; ?>" 
       class="btn btn-danger mt-2"
       onclick="return confirm('Are you sure you want to cancel this order?');">
        Cancel Order
    </a>
<?php } ?>

    </td>
</tr>



<?php
    }
} else {
?>
<tr>
    <td colspan="5" class="text-center text-muted py-4">
        <h5>No orders yet 📭</h5>
        <a href="index.php" class="btn btn-outline-success mt-2">
            Continue Shopping
        </a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</div>
</div>

</div>
</section>


<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

    $('.collapse').on('show.bs.collapse', function () {
        var id = $(this).attr('id');
        $('button[data-target="#' + id + '"]').text('Hide Details');
    });

    $('.collapse').on('hide.bs.collapse', function () {
        var id = $(this).attr('id');
        $('button[data-target="#' + id + '"]').text('View Details');
    });

});
</script>


</body>
</html>
