<?php
session_start();
?><!DOCTYPE html>
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
<style type="text/css">
  h4{
    border-style: dotted;
    border-spacing: 10px;
    border-color: cyan;
  }
</style>
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
       <h3><a class="navbar-brand" href="index.php">HOME</a>/Booking</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="services.php" class="nav-link">Go Back</a></li>
            

           
          </ul>
        </div>
      </div>
    </nav>
<?php
    $amount=$_SESSION["totalrate"];
    ?>
    <!-- END nav -->
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex align-items-center">
          <div class="col-md-2"></div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="appointment-info text-center p-5">
              <div class="mb-4">
                <h2><font face="Snap ITC">Booking On progress</font> </h2>
               
                
              </div>
              <div class="mb-4">
                <h2 class="mb-3"><font color="indigo">You have to pay</font></h2>
                <h4><font face="purisa" size="10" color="blue"><?php echo"Rs.". $amount; ?></font></h4>
              </div>
             
            </div>
          </div>
          
          <div class="col-md-6 appointment pl-md-5 ftco-animate">
            <h3 class="mb-3"></h3>
          <div class="appointment-info text-center p-5">
              <div class="mb-4">
                <h2><font color="cyan" face="Lucida Calligraphy">Select a payment option</font> </h2>
               
                
              </div>
              <div class="mb-4">
                <form action="#" method="POST">
                <font size="5" color="indigo"><input type="radio" name="pay" value="online" selected="">Online payment</font>
                <br>
                   <font size="5" color="indigo"><input type="radio" name="pay" value="cash">Cash on service</font>
                 <div class="form-group"><br>
                <input type="submit" name="submit" value="Confirm" class="btn btn-white btn-outline-white py-3 px-4">
              </div>
                </form>
              </div>
             
            </div>
          </div>
          </div>          
        </div>
      </div>
    </section>
<?php
include "footer.php";
?>
<?php
include "../dbconnect.php";
if(isset($_POST["submit"]))
{
  $payment=$_POST["pay"];
  if($payment=="online")
  {
    echo '<meta http-equiv="refresh" content="0;payment/index.php">';
  }
  if($payment=="cash")
  {
     echo '<meta http-equiv="refresh" content="0;alert.php">';
  }
}
?>