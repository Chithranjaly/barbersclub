<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/backheader2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">

            <img src="img/logo4.jpg" alt="" >

            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="#A68538">The Complete Men's Salon</font></h1>
            
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://youtu.be/N16yoYslKoE" class="btn btn-white btn-outline-white px-4 py-3">View Our Services</a></p>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
      <h3>HOME/Userprofile</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
            
            <li class="nav-item active"><a href="#" class="nav-link">User profile</a></li>
             <li class="nav-item"><a href="upassword.php" class="nav-link">Change Password</a></li>
   <li class="nav-item"><a href="../login.php" class="nav-link">Logout</a></li>



           
          </ul>
        </div>
      </div>
    </nav>


       <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Your Profile</h2>
                   
          </div>
        </div>
        <div class="row">
           <?php
                include "../dbconnect.php";
                $id= $_SESSION["userid"];
                $sql="select * from tbl_user_register where user_id='$id'";
                $q=mysqli_query($con,$sql);
                while($r=mysqli_fetch_array($q))
                {   ?>

          <div class="col-lg-15 d-flex mb-sm-15 ftco-animate">
            <div class="staff">

            <form action="uedit.php" method="post" enctype="multipart/form-data">
              <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
             
              <img default="img/pic.jpg" src="<?php echo '../uploads/'. $r['profile_image']; ?>" width="90" height="90" >
            </span>
            <input type="file" value="<?php echo '../img/'. $r['profile_image']; ?>" name="fileToUpload" readonly="" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>




              <div class="info text-center">
                <a href="uedit.php"><input type="button" name="button" value="EDIT"></a>

                Name:<input type="text" class="form-control" name="name" readonly="" value="<?php echo $r['name']; ?>"></h3>
               <h6>Phone Number:<input type="text" class="form-control" readonly="" name="phone"  value="<?php echo $r['phone']; ?> "></h6>
               <h6>Email ID:<input type="email" class="form-control" readonly="" name="email"  value="<?php echo $r['email']; ?>"></h6>
               <h6>Address:<textarea name="address"class="form-control"  value="<?php echo $r['address']; ?>"><?php echo $r['address']; ?></textarea> </h6>
               <h6>Location:<input type="text" class="form-control"  name="location" readonly="" value="<?php echo $r['location']; ?>"></h6>
               <h6>Landmark:<input type="text"class="form-control"  name="landmark" readonly="" value="<?php echo $r['landmark']; ?>"></h6>
             <?php } ?>
               
               <script src="scripts.js"></script>




          
                </form>
                
              </div>
            </div>
          </div>
         
     
          
      </div>
    </section>

      

    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Spa Center</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Body Care</a></li>
                <li><a href="#" class="py-2 d-block">Massage</a></li>
                <li><a href="#" class="py-2 d-block">Hydrotherapy</a></li>
                <li><a href="#" class="py-2 d-block">Yoga</a></li>
                <li><a href="#" class="py-2 d-block">Sauna</a></li>
                <li><a href="#" class="py-2 d-block">Aquazone</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>