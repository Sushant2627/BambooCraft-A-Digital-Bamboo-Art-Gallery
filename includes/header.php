
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                <?php
                if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calculate cart count
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['qty'];
    }
}

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>


                 <ul class="contact-info">
    <li>
        <span class="fas fa-phone-volume"></span>
        <p><?php echo $row['MobileNumber']; ?></p>
    </li>

    <li>
        <span class="fas fa-envelope"></span>
        <p><?php echo $row['Email']; ?></p>
    </li>
</ul><?php } ?>
               </div>
            </div>
            <div class="container-fluid">
  <div class="hedder-up row align-items-center py-3">
    <div class="col-lg-3 col-md-3 logo-head">
      <h1 class="m-0">
        <a class="navbar-brand" href="index.php">
<i class="fa fa-leaf" style="color:#2f7d32; margin-right:5px;"></i>
<span class="brand-main">BambooCraft</span>
          <span class="brand-sub"> – A Digital Bamboo Art Gallery</span>
        </a>
      </h1>
    </div>
  </div>
</div>

            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                 <ul class="navbar-nav">

   <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
   </li>

   <li class="nav-item">
      <a href="about.php" class="nav-link">About</a>
   </li>

   <!-- Art Type Dropdown -->
   <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Art Type
   </a>

   <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
      <?php
      $ret = mysqli_query($con, "SELECT * FROM tblarttype");
      while ($row = mysqli_fetch_array($ret)) {
      ?>
         <a class="dropdown-item"
            href="product.php?cid=<?php echo $row['ID']; ?>&artname=<?php echo $row['ArtType']; ?>">
            <?php echo $row['ArtType']; ?>
         </a>
      <?php } ?>
   </div>
</li>

   <!-- Cart -->
   <li class="nav-item">
   <a href="cart.php" class="nav-link">
      🛒 Cart (<span id="cart-count"><?php echo $cartCount; ?></span>)
   </a>
</li>

   


   

   <li class="nav-item">
      <a href="contact.php" class="nav-link">Contact</a>
   </li>

   <li class="nav-item">
      <a href="art-enquiry.php" class="nav-link">Enquiry</a>
   </li>

<?php if(!isset($_SESSION['userid'])) { ?>

   <li class="nav-item">
      <a href="login.php" class="nav-link">Login</a>
   </li>

<?php } else { ?>

   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
         role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         👤 My Account
      </a>

      <div class="dropdown-menu">
         <a class="dropdown-item" href="profile.php">👤 My Profile</a>
         <a class="dropdown-item" href="orders.php">📦 My Orders</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item text-danger" href="logout.php"> 🔴 Logout
</a>
      </div>
   </li>

<?php } ?>



   <li class="nav-item">
      <a href="admin/login.php" class="nav-link">Admin</a>
   </li>

</ul>

               </div>
            </nav>
         </div>
         <!-- Slideshow 4 -->
        
      
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="#" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Your Name" name="Your Name" required="">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="Your Email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1--> 
       <style>
.logo-head .navbar-brand {
    font-family: 'Poppins', sans-serif ;
    font-weight: 700;
    font-size: 30px;
}


.brand-main {
    color: #2f7d32;   /* Bamboo green for main brand */
}

.brand-sub {
    color: #989696;       /* Dark gray for subtitle */
    font-weight: 400;
    font-size: 1rem;
    margin-left: 5px;
}

/* Art Type dropdown hover effect */
.dropdown-menu {
    border-radius: 6px;
    padding: 5px 0;
}

.dropdown-menu .dropdown-item {
    padding: 10px 18px;
    font-size: 15px;
    color: #333;
    transition: all 0.25s ease;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #e91e63;   /* Professional pink */
    color: #ffffff;
    font-weight: 600;
}
.contact-info {
    display: flex;
    justify-content: flex-end; /* moves content to right */
    gap: 30px;
}

.contact-info li {
    list-style: none;
    display: flex;
    align-items: center;
}

.contact-info span {
    margin-right: 8px;
    color: #2c7a7b;
}
</style>