<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {

    // Delete functionality
    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = mysqli_query($con, "DELETE FROM tblartproduct WHERE ID='$rid'");
        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href = 'manage-art-product.php'</script>";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Manage Art Product | Art Gallery Management System</title>
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
                            <h3 class="page-header"><i class="fa fa-table"></i> Manage Art Product</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                                <li><i class="fa fa-table"></i>Manage Art Product</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <!-- Filter Section with Improved Styling -->
<!-- Filter Section with Unified Styling -->
<!-- Filter Section with ID-Ordered Art Types -->
<!-- Filter Section with Custom-Colored Buttons -->
<!-- Filter Section with Custom-Colored Buttons -->
<div class="row">
    <div class="col-lg-12">
        <h4 class="mb-3"><strong>Filter by Art Type:</strong></h4>
        <div class="d-flex flex-wrap gap-2">
            <a href="manage-art-product.php" 
                class="btn custom-filter-btn <?php echo !isset($_GET['arttype']) ? 'active' : ''; ?>">
                All
            </a>
            <?php
            // Order by ID instead of alphabetical
            $typeQuery = mysqli_query($con, "SELECT * FROM tblarttype ORDER BY ID ASC");
            while ($typeRow = mysqli_fetch_array($typeQuery)) {
                $isActive = (isset($_GET['arttype']) && $_GET['arttype'] == $typeRow['ID']) ? 'active' : '';
                echo "<a href='manage-art-product.php?arttype={$typeRow['ID']}' 
                        class='btn custom-filter-btn $isActive'>
                        {$typeRow['ArtType']}
                      </a>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Custom CSS for Filter Buttons -->
<style>
    .custom-filter-btn {
        background-color: #3A4750; /* Default color (lighter than sidebar) */
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .custom-filter-btn:hover {
        background-color: #2A3542; /* Slightly darker shade on hover */
        color: #ffffff; /* Ensures text remains visible */
    }

    .custom-filter-btn.active {
        background-color: #1F2833; /* Darker shade when selected */
        color: #ffffff; /* Keeps text white */
        font-weight: bold;
    }
</style>





                    <br>

                    <!-- Product Table -->
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Manage Art Product
                                </header>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reference Number</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Art Type</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $condition = "";
                                        if (isset($_GET['arttype'])) {
                                            $artTypeID = intval($_GET['arttype']);
                                            $condition = "WHERE p.ArtType = '$artTypeID'";
                                        }

                                        $ret = mysqli_query($con, "SELECT p.*, t.ArtType FROM tblartproduct p 
                                            JOIN tblarttype t ON p.ArtType = t.ID 
                                            $condition
                                            ORDER BY p.ID DESC"); // Sort by latest product first

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['RefNum']; ?></td>
                                                <td><?php echo $row['Title']; ?></td>
                                                <td><img src="images/<?php echo $row['Image']; ?>" width='100' height="100"></td>
                                                <td><?php echo $row['ArtType']; ?></td>
                                                <td><?php echo $row['CreationDate']; ?></td>
                                                <td>
                                                    <a href="edit-art-product-detail.php?editid=<?php echo $row['ID']; ?>" class="btn btn-success">Edit</a> ||
                                                    <a href="manage-art-product.php?delid=<?php echo $row['ID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
