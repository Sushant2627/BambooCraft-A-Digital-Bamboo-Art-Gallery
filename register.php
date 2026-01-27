<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirm_password']);

    if($password != $cpassword){
        echo "<script>alert('Passwords do not match');</script>";
    } else {

        $check = mysqli_query($con,"SELECT ID FROM tblusers WHERE Email='$email'");
        if(mysqli_num_rows($check)>0){
            echo "<script>alert('Email already exists');</script>";
        } else {
            mysqli_query($con,
              "INSERT INTO tblusers(FullName,Email,Password)
               VALUES('$name','$email','$password')");
            echo "<script>alert('Registration successful');location='login.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>User Registration | Bamboo Art Gallery</title>

<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-theme.css" rel="stylesheet">
<link href="admin/css/elegant-icons-style.css" rel="stylesheet" />
<link href="admin/css/font-awesome.css" rel="stylesheet" />
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/style-responsive.css" rel="stylesheet" />
</head>

<body style="background-image:url('admin/images/background-img.jpg');
background-size:cover;">

<div class="container">
<form class="login-form" method="post">
<div class="login-wrap">

<p class="login-img"><i class="icon_profile"></i></p>

<div class="input-group">
<span class="input-group-addon"><i class="icon_profile"></i></span>
<input type="text" name="name" class="form-control"
placeholder="Full Name" required>
</div>

<div class="input-group">
<span class="input-group-addon"><i class="icon_mail_alt"></i></span>
<input type="email" name="email" class="form-control"
placeholder="Email" required>
</div>

<div class="input-group">
<span class="input-group-addon"><i class="icon_key_alt"></i></span>
<input type="password" name="password" class="form-control"
placeholder="Password" required>
</div>

<div class="input-group">
<span class="input-group-addon"><i class="icon_key_alt"></i></span>
<input type="password" name="confirm_password" class="form-control"
placeholder="Confirm Password" required>
</div>

<button class="btn btn-success btn-lg btn-block"
name="register">
Register
</button>

<p style="margin-top:10px;text-align:center;font-weight:bold;">
<a href="login.php">Already have an account? Login</a>
</p>

<p style="margin-top:10px;text-align:center;">
<a href="index.php">Back to Home</a>
</p>

</div>
</form>
</div>

</body>
</html>
