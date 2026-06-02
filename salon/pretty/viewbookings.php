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
       <h3><a class="navbar-brand" href="index.php">HOME</a>/Your Bookings</h3>
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
   
       $id= $_SESSION["userid"];
         
    ?>
    <!-- END nav -->
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex align-items-center">
          <div class="col-md-2"></div>
      
          
          <div class="col-md-6 appointment pl-md-5 ftco-animate">
            <h3 class="mb-3"> <font color="cyan" size="5" face="Lucida Calligraphy">HERE ARE YOUR BOOKINGS</font></h3>
               <?php
         include "../dbconnect.php";
         $sql="select * from appoinment where user_id=$id";
         $run=mysqli_query($con,$sql);
         $i=0;
         while($row=mysqli_fetch_array($run))
         {
          $time=$row["time"];
           $i++;

         ?>
          <div class="appointment-info text-center p-5">
              <div class="mb-4">
                <font color="brown" size="4" face="Lucida Calligraphy">Booking &nbsp <?php echo $i; ?> </font>
                <h2 align="left">Type: &nbsp  <font color="indigo" face="Lucida Calligraphy">(at <?php echo $row["type"]; ?>)</font>
                  <form><input type="hidden" name="id" value=" <?php echo $row["id"]; ?>"></form> 
                <h2 align="left">Date: &nbsp <font color="indigo" face="Lucida Calligraphy"><?php echo $row["date"]; ?> </font> </h2>
                <?php
                if(($time>7)&&($time<12))
                {
                  $ap="AM";
                }
                else
                {
                  $ap="PM";
                }
                ?>
                <h2 align="left">Time: &nbsp <font color="indigo" face="Lucida Calligraphy"><?php echo $row["time"].":00"." ".$ap; ?> </font> </h2>
                 <h2 align="left">Amount: &nbsp<font color="indigo" face="Lucida Calligraphy"> Rs. <?php echo $row["amount"]; ?> </font> </h2>
                 <a href="viewdetails.php?id=<?php echo $row["id"]; ?>"><font size="4" color="blue"> Details</font></a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="delete.php?id=<?php echo $row["id"]; ?>"><font size="4" color="red">Cancel Booking</font></a>
              </div>
           
              <div class="mb-4">
               
              </div>
              </div>
                   <hr><?php } ?>
             
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
}
?>