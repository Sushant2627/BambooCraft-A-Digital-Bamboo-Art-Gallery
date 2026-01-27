<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con,
        "SELECT ID, FullName FROM tblusers 
         WHERE Email='$email' AND Password='$password'"
    );

    $row = mysqli_fetch_array($query);

    if($row){
        $_SESSION['userid'] = $row['ID'];
        $_SESSION['username'] = $row['FullName'];
        echo "<script>location='index.php'</script>";
    } else {
        echo "<script>alert('Invalid Login Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login | Bamboo Art Gallery</title>

  <link href="admin/css/bootstrap.min.css" rel="stylesheet">
  <link href="admin/css/bootstrap-theme.css" rel="stylesheet">
  <link href="admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="admin/css/font-awesome.css" rel="stylesheet" />
  <link href="admin/css/style.css" rel="stylesheet">
  <link href="admin/css/style-responsive.css" rel="stylesheet" />
</head>

<body style="background-image:url('admin/images/background-img.jpg');
background-size:cover;background-position:center;">

<div class="container">
<form class="login-form" method="post">
<div class="login-wrap">

<p class="login-img"><i class="icon_lock_alt"></i></p>

<div class="input-group">
<span class="input-group-addon"><i class="icon_profile"></i></span>
<input type="email" class="form-control" name="email"
placeholder="Email" required>
</div>

<div class="input-group">
<span class="input-group-addon"><i class="icon_key_alt"></i></span>
<input type="password" class="form-control" name="password"
placeholder="Password" required>
</div>

<button class="btn btn-primary btn-lg btn-block" 
type="submit" name="login">
Login
</button>

<p style="margin-top:10px;font-weight:bold;text-align:center;">
<a href="register.php">Don't have an account? Register</a>
</p>

<p style="margin-top:10px;font-weight:bold;text-align:center;">
<a href="index.php">Back to Home</a>
</p>

</div>
</form>
</div>

</body>
</html>
