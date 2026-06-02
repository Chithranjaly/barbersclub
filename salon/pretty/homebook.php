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
<style type="text/css">
  
</style>
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
       <h3><a class="navbar-brand" href="index.php">HOME</a>/progress</h3>
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

    <!-- END nav -->

  

    
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
         <div class="col-md-6 appointment pl-md-5 ftco-animate">
            <h3 class="mb-3">You have to provide us some more informations</h3><br>
          
<hr>
            <form action="#" method="POST" class="appointment-form">

        
              <br>
              <input type="text"  name="landmark" placeholder="Enter your landmark"><br>
              <br><input type="text"  name="street" placeholder="street name" ><br><br>
              <input type="submit" name="submit"  value="confirm">
         </form>   
     
     </div></div></div></section>         
              
  
   <?php
   if (isset($_POST["submit"]))
    {
     $landmark=$_POST["landmark"];
     $street=$_POST["street"];

           $id=$_SESSION["bookid"];
        

     include "../dbconnect.php";
               

     $sql="update appoinment set landmark='$landmark',street='$street' where id=$id";
     $run=mysqli_query($con,$sql);

     
     if($run)
     {
    
      echo '<meta http-equiv="refresh" content="0;shopbook.php">';
     }
     else
     {
      echo "<script>alert('Booking failed $id')</script>";
     }
   }
    ?>

 <?php
     include "footer.php";
   ?>

  