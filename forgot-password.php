<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
    $email = $_POST['email'];

    $query = mysqli_query($con,
        "SELECT ID FROM tblusers WHERE Email='$email'"
    );
    $ret = mysqli_fetch_array($query);

    if($ret){
        $_SESSION['email'] = $email;
        echo "<script>location='reset-password.php'</script>";
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Forgot Password | BambooCraft – A Digital Bamboo Art Gallery</title>

<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-theme.css" rel="stylesheet">
<link href="admin/css/elegant-icons-style.css" rel="stylesheet">
<link href="admin/css/font-awesome.css" rel="stylesheet">
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/style-responsive.css" rel="stylesheet">
</head>

<body class="login-img3-body">
<div class="container">
<form class="login-form" method="post">
<div class="login-wrap">

<p class="login-img"><i class="icon_lock_alt"></i></p>

<div class="input-group">
<span class="input-group-addon"><i class="icon_profile"></i></span>
<input type="email" class="form-control" name="email"
placeholder="Registered Email" required>
</div>

<button class="btn btn-primary btn-lg btn-block"
type="submit" name="submit">Verify</button>

<span class="pull-right">
<a href="login.php">Signin</a>
</span>

</div>
</form>
</div>
</body>
</html>
