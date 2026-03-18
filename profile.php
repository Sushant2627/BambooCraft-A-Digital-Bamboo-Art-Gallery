<?php
session_start();
include('includes/dbconnection.php');

if (!isset($_SESSION['userid'])) {
    header('location:login.php');
    exit();
}

$uid = $_SESSION['userid'];

$query = mysqli_query($con, "SELECT * FROM tblusers WHERE ID='$uid'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $mobile   = mysqli_real_escape_string($con, $_POST['mobile']);
    $address  = mysqli_real_escape_string($con, $_POST['address']);
    $city     = mysqli_real_escape_string($con, $_POST['city']);
$state    = mysqli_real_escape_string($con, $_POST['state']);
$pincode  = mysqli_real_escape_string($con, $_POST['pincode']);


    mysqli_query($con, "
    UPDATE tblusers SET
        FullName='$fullname',
        MobileNumber='$mobile',
        Address='$address',
        City='$city',
        State='$state',
        Pincode='$pincode'
    WHERE ID='$uid'
");


    echo "<script>alert('Profile updated successfully');</script>";
    echo "<script>window.location='profile.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile | BambooCraft – A Digital Bamboo Art Galleryy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <style
    
>.btn-style {
    background-color: #c2185b;  
    color: #fff;
    border: none;
    font-weight: 600;
    padding: 10px 35px;
    border-radius: 25px;
    transition: 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.btn-style:hover {
    background-color: #a81b4e;  
}


.section-title {
    color: #c2185b !important; /* Deep rose headers */
    font-weight: 600;
    font-size: 1.5rem;
}
.profile-card {
    background-color: #fcdde6;  /* Slightly darker soft pink */
    color: #070707;                /* Dark text for readability */
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.input-icon {
    position: relative;
}

.input-icon i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #c2185b;
}

.input-icon input,
.input-icon textarea {
    padding-left: 40px; /* space for icon */
color: #070707;
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
            <li>My Profile</li>
        </ul>
    </div>
</div>

<section class="banner-bottom py-5">
  <div class="container">

    <div class="profile-card">

      <!-- Personal Information -->
      <h4 class="section-title mb-4">👤 Personal Information</h4>

      <form method="post">

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label fw-bold">Full Name</label>
            <input type="text" name="fullname" class="form-control form-control-lg"
                   value="<?php echo $user['FullName']; ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-bold">Email Address</label>
            <input type="email" class="form-control form-control-lg"
                   value="<?php echo $user['Email']; ?>" readonly>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="form-label fw-bold">Mobile Number</label>
            <input type="text" name="mobile" class="form-control form-control-lg"
                   value="<?php echo $user['MobileNumber']; ?>" required>
          </div>
        </div>

        <hr class="my-4">

        <!-- Address Details -->
        <h4 class="section-title mb-4">🏠 Address Details</h4>

        <div class="mb-3">
          <label class="form-label fw-bold">Street Address</label>
          <textarea name="address" class="form-control form-control-lg"
                    placeholder="House No, Street, Area" required><?php echo $user['Address']; ?></textarea>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label fw-bold">City</label>
            <input type="text" name="city" class="form-control form-control-lg"
                   value="<?php echo $user['City']; ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label fw-bold">State</label>
            <input type="text" name="state" class="form-control form-control-lg"
                   value="<?php echo $user['State']; ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label fw-bold">Pincode</label>
            <input type="text" name="pincode" class="form-control form-control-lg"
                   value="<?php echo $user['Pincode']; ?>" required>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" name="update" class="btn btn-style btn-lg px-5">
            Update Profile
          </button>
        </div>

      </form>
    </div>

  </div>
</section>




<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
