<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
    $email = $_SESSION['email'];
    $password = md5($_POST['newpassword']);

    $query = mysqli_query($con,
        "UPDATE tblusers SET Password='$password' WHERE Email='$email'"
    );

    if($query){
        echo "<script>alert('Password successfully changed');</script>";
        session_destroy();
        echo "<script>location='login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset Password | BambooCraft – A Digital Bamboo Art Gallery</title>

<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-theme.css" rel="stylesheet">
<link href="admin/css/elegant-icons-style.css" rel="stylesheet">
<link href="admin/css/font-awesome.css" rel="stylesheet">
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/style-responsive.css" rel="stylesheet">

<script>
function checkpass(){
  if(document.changepassword.newpassword.value !=
     document.changepassword.confirmpassword.value){
    alert('New Password and Confirm Password do not match');
    return false;
  }
  return true;
}
</script>
</head>

<body class="login-img3-body">

<div class="container">
<form class="login-form" method="post" name="changepassword"
onsubmit="return checkpass();">

<div class="login-wrap">
<p class="login-img"><i class="icon_lock_alt"></i></p>

<div class="input-group">
<span class="input-group-addon"><i class="icon_key_alt"></i></span>
<input type="password" class="form-control"
name="newpassword" placeholder="New Password" required>
</div>

<div class="input-group">
<span class="input-group-addon"><i class="icon_key_alt"></i></span>
<input type="password" class="form-control"
name="confirmpassword" placeholder="Confirm Password" required>
</div>

<button class="btn btn-primary btn-lg btn-block"
type="submit" name="submit">
Reset
</button>

<span class="pull-right">
<a href="login.php">Signin</a>
</span>

</div>
</form>
</div>

</body>
</html>
