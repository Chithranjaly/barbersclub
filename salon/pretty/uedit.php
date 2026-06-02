<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pretty - Free Bootstrap 4 Template by Colorlib</title>
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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">


  </head>
  <body>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/BG1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <div class="icon">
              <a href="index.html" class="logo">
                <span class="flaticon-flower"></span>
                <h1>The Barber Club</h1>
                <h3>The complete men's salon</h3> 
              </a>
            </div>
            <h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><h1>
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Userprofile</span></p>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">The Barber Club</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="userprofile.php" class="nav-link">go back</a></li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <!--<section class="ftco-section contact-section">
        <div class="container mt-5">
          <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate">
              
            </div>
            
            <div class="col-md-6 ftco-animate">
              <form action="#" class="contact-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section> -->
       <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Your Profile</h2>
            <h4 class="mb-4">You can Edit your  Address , Location and landmark if u want</h4>
            
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
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img default="img/profile1.jpg" src="<?php echo '../uploads/'. $r['profile_image']; ?>" width="70" height="80" onClick="triggerClick()" id="profileDisplay" >
            </span>
            <input type="file" value="<?php echo '../img/'. $r['profile_image']; ?>" name="fileToUpload" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" width="70" height="80">
            <label>Profile Image</label>
          </div>




              <div class="info text-center">

                Name:<input type="text" class="form-control" name="name" readonly="" value="<?php echo $r['name']; ?>"></h3>
               <h6>Phone Number:<input type="text" class="form-control" readonly="" name="phone"  value="<?php echo $r['phone']; ?> "></h6>
               <h6>Email ID:<input type="email" class="form-control" readonly="" name="email"  value="<?php echo $r['email']; ?>"></h6>
               <h6>Address:<textarea name="address"class="form-control"  value="<?php echo $r['address']; ?>"><?php echo $r['address']; ?></textarea> </h6>
               <h6>Location:<input type="text" class="form-control"  name="location" value="<?php echo $r['location']; ?>"></h6>
               <h6>Landmark:<input type="text"class="form-control"  name="landmark"  value="<?php echo $r['landmark']; ?>"></h6>
               <input type="submit" name="save_profile" value="APPLY CHANGES">
               <a href="userprofile.php"><input type="button" name="button" value="GO BACK"></a>
               <script src="scripts.js"></script>


                  <?php   } 
                       $msg = "";
  $msg_class = "";

                  if(isset($_POST["save_profile"]))
                  { 

                   $address=$_POST["address"];
                   $location=$_POST["location"];
                   $landmark=$_POST["landmark"];

                
    
    // For image upload
$target_dir= "../uploads/";
//to get the name of file to store to database
$filename=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


                   $sql="update tbl_user_register set address='$address',profile_image='$filename',location='$location',landmark='$landmark' where user_id=$id";
                  // echo $sql;
                   $q=mysqli_query($con,$sql);
                   if($q)
                   {
                    echo "<script>alert('Profile changed successfully')</script>";
                     echo '<meta http-equiv="refresh" content="0;userprofile.php">';
 
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
       
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }

                    
                   
                   }



                   ?>
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