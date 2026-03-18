<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {
    
   $orderId = intval($_GET['id']);

// 1️⃣ First handle update
if (isset($_POST['update'])) {

    $check = mysqli_query($con, "
        SELECT OrderStatus, CancelledBy 
        FROM tblorders 
        WHERE ID='$orderId'
    ");

    $data = mysqli_fetch_assoc($check);

    // ❌ Block ONLY if cancelled by USER
    if ($data['OrderStatus'] == 'Cancelled' && $data['CancelledBy'] == 'User') {

        echo "<script>alert('User cancelled orders cannot be modified.');</script>";
        exit();

    }

    // ✅ Otherwise allow update
    $status = mysqli_real_escape_string($con, $_POST['status']);

    if ($status == 'Cancelled') {

        // If admin cancels
        mysqli_query($con, "
            UPDATE tblorders 
            SET OrderStatus='$status',
                CancelledBy='Admin'
            WHERE ID='$orderId'
        ");

    } else {

        mysqli_query($con, "
            UPDATE tblorders 
            SET OrderStatus='$status'
            WHERE ID='$orderId'
        ");
    }

   echo "<div class='alert alert-success'>
        Order status updated successfully.
      </div>";

}


// 2️⃣ ALWAYS fetch order details (outside update block)
$query = mysqli_query($con, "
    SELECT o.*, p.Title, u.FullName
    FROM tblorders o
    JOIN tblartproduct p ON o.ProductID = p.ID
    JOIN tblusers u ON o.UserID = u.ID
    WHERE o.ID = '$orderId'
");

$order = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Order | Art Gallery Management System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<body>
<section id="container">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-edit"></i> Update Order Status</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                        <li><i class="fa fa-table"></i><a href="manage-orders.php">Manage Orders</a></li>
                        <li><i class="fa fa-edit"></i>Update Order</li>
                    </ol>
                </div>
            </div>

            <div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">

                        <header class="panel-heading">
                            Order Details
                        </header>
                        <div class="panel-body">
                          <form method="post">

    <!-- Order Info Section -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label><strong>Order Number</strong></label>
            <div class="form-control bg-light"><?php echo $order['OrderNumber']; ?></div>
        </div>

        <div class="col-md-6">
            <label><strong>Customer Name</strong></label>
            <div class="form-control bg-light"><?php echo $order['FullName']; ?></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label><strong>Product</strong></label>
            <div class="form-control bg-light"><?php echo $order['Title']; ?></div>
        </div>

        <div class="col-md-6">
            <label><strong>Quantity</strong></label>
            <div class="form-control bg-light"><?php echo $order['Quantity']; ?></div>
        </div>
    </div>

   <div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label><strong>Total Amount</strong></label>
            <div class="form-control bg-light text-success font-weight-bold">
                ₹<?php echo $order['TotalAmount']; ?>
            </div>
        </div>
    </div>

</div>

    <br>

    <!-- Current Status Badge -->
    <div class="mb-3">
        <label><strong>Current Status : </strong></label>

        <?php
        $status = $order['OrderStatus'];
        $badgeClass = '';

        if ($status == 'Pending') $badgeClass = 'label label-warning';
        elseif ($status == 'Processing') $badgeClass = 'label label-primary';
        elseif ($status == 'Shipped') $badgeClass = 'label label-info';
        elseif ($status == 'Delivered') $badgeClass = 'label label-success';
        elseif ($status == 'Cancelled') $badgeClass = 'label label-danger';
        ?>

        <span class="<?php echo $badgeClass; ?>" style="padding:6px 10px; font-size:13px;">
            <?php echo $status; ?>
        </span>
    </div>
<br>
    <!-- Change Status Section -->
    <div class="form-group">
        <label><strong>Change Status</strong></label>

        <?php if ($order['OrderStatus'] == 'Cancelled' && $order['CancelledBy'] == 'User') { ?>

            <select class="form-control" disabled>
                <option><?php echo $order['OrderStatus']; ?></option>
            </select>

            <small class="text-danger">
                This order was cancelled by user. Status cannot be changed.
            </small>

        <?php } else { ?>

<select name="status" class="form-control" style="width:50%;" required>
                <?php
                $statuses = ['Pending','Processing','Shipped','Delivered','Cancelled'];
                foreach ($statuses as $s) {
                    $selected = ($order['OrderStatus'] == $s) ? 'selected' : '';
                    echo "<option value='$s' $selected>$s</option>";
                }
                ?>
            </select>

        <?php } ?>
    </div>

    <!-- Buttons -->
<div style="text-align:center; margin-top:15px;">
        <?php if (!($order['OrderStatus'] == 'Cancelled' && $order['CancelledBy'] == 'User')) { ?>
            <button type="submit" name="update" class="btn btn-success">
                <i class="fa fa-check"></i> Update Status
            </button>
        <?php } ?>

        <a href="manage-orders.php" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Back to Orders
        </a>
    </div>

</form>



                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>

    <?php include_once('includes/footer.php'); ?>
</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/scripts.js"></script>

</body>
</html>
<?php } ?>
