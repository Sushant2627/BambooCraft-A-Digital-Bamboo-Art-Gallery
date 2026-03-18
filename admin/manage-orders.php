<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {
    // your code
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Orders | Art Gallery Management System</title>
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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage Orders</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage Orders</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Orders List
                        </header>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Customer Name</th>
                                    <th>Order Number</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
$query = mysqli_query($con, "
    SELECT o.*, p.Title, u.FullName
    FROM tblorders o
    JOIN tblartproduct p ON o.ProductID = p.ID
    JOIN tblusers u ON o.UserID = u.ID
    ORDER BY o.ID DESC
");
$cnt = 1;
while ($row = mysqli_fetch_array($query)) {
?>

                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['FullName']; ?></td>                                        
                                        <td><?php echo $row['OrderNumber']; ?></td>
                                        <td><?php echo $row['Title']; ?></td>
                                        <td><?php echo $row['Quantity']; ?></td>
                                        <td>₹<?php echo $row['TotalAmount']; ?></td>
                                        <td><?php
$status = $row['OrderStatus'];

if ($status == 'Pending') {
    $color = '#ffc107'; // yellow
} elseif ($status == 'Processing') {
    $color = '#007bff'; // blue
} elseif ($status == 'Shipped') {
    $color = '#17a2b8'; // cyan
} elseif ($status == 'Delivered') {
    $color = '#28a745'; // green
} elseif ($status == 'Cancelled') {
    $color = '#dc3545'; // red
} else {
    $color = '#6c757d'; // grey
}
?>

<span style="background-color: <?php echo $color; ?>;
             color: white;
             padding: 5px 10px;
             border-radius: 12px;
             font-size: 12px;">
    <?php echo $status; ?>
</span>


                                        </td>
                                        <td>
                                            <a href="update-orders.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Update Status</a>
                                        </td>
                                    </tr>
                                <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>

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
