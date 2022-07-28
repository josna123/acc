<?php

require('regscriptpolice.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Police Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.7.2
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html">About Us</a></li>
          <li><a class="nav-link scrollto" href="index.html">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <div class="container" style="padding-top: 10%; padding-bottom: 10%;">
    <div class="row justify-content-between">
        <div class="pt-5 order-2 order-lg-1 align-items-center">
    <div class="registration-form">
      <h4 class="text-center">Create a New Account</h4>
      
        <p class="text-success text-center">
         <?php echo $register; ?>
        </p> 
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="form-group">
           <label for="email">Station Name</label>
               <input type="text" class="form-control" placeholder="Enter Your Station Name" name="name" value="<?php echo $set_name;?>">
               <p class="err-msg">
                <?php if($nameErr!=1){ echo $nameErr; }?>
                </p>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  placeholder="Enter password" name="password">
            <p class="err-msg">
                
                <?php if($passErr!=1){ echo $passErr; } ?>

            </p>
        </div>
        <!--//Confirm Password//-->
        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Enter Confirm password" name="cpassword">
            <p class="err-msg">
                
                <?php if($cpassErr!=1){ echo $cpassErr; } ?>

            </p>
        </div>
        <div class="form-group">
            <label for="email">Address</label>
                <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?php echo $set_address;?>">
                <p class="err-msg"> 
                    <?php if($addressErr!=1){ echo $addressErr; } ?>
                </p>
        </div>
        <div class="form-group">
            <label for="email">Contact Number</label>
                <input type="text" class="form-control" placeholder="Enter contact number" name="contact_number" value="<?php echo $set_contactnumber;?>">
                <p class="err-msg">
                    <?php if($contactErr!=1){ echo $contactErr; } ?>
                </p>
        </div>
    
        <div class="text-center"><button type="submit" name="submit" style="background: #ff63ce;
                                border: 0;
                                padding: 10px 30px;
                                color: #fff;
                                transition: 0.4s;
                                border-radius: 50px;">Register Now</button></div>
      </form>
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
</div>
</div>
</div>
</div>
</body>
</html>