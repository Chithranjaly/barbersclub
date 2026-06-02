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
<style>
table {
  width:100%;
  background-color: #1234;
  font-family: Lucida Calligraphy;

}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th{
  padding: 15px;
  text-align: left;
  background-color:indigo; 
  font-family: Lucida Calligraphy;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: blue;
  color: white;
}
</style>
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
       <h3><a class="navbar-brand" href="index.php">HOME</a>/Booking for shopping</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="viewbookings.php" class="nav-link">Go Back</a></li>
            

           
          </ul>
        </div>
      </div>
    </nav>
<?php
   
       $id=$_GET["id"];
         
    ?>
    <!-- END nav -->
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex align-items-center">
          <div class="col-md-2"></div>
      
          
          <div class="col-md-6 appointment pl-md-5 ftco-animate">
                <h2 align="left">Booking Id- <font color="indigo">  <?php echo $id; ?></font></h2> 
             
          <div class="appointment-info text-center p-5">
              <div class="mb-4">
                 <table>
         <tr>
          <th>Service</th><th>Rate</th><th>Time</th>
          </tr>
                  <?php
         include "../dbconnect.php";
         $sql="select * from bookservice where book_id=$id";
         $run=mysqli_query($con,$sql);
         
         while($row=mysqli_fetch_array($run))
         {
          
           $sum_rate=$row["sum_rate"];
           $time=$row["sum_time"];
         ?>
                
        
          <tr>
            <td><?php echo $row["service"]; ?></td><td><?php echo "Rs.". $row["rate"]; ?></td><td><?php echo  $row["time"]." ". "min" ; ?></td>
          </tr>
           
              </div>
                <?php } ?>
           </table> 
              <div class="mb-4">
             <h2 align="left">Total Amount- <font color="indigo" face="Lucida Calligraphy">  <?php echo "Rs.".$sum_rate; ?></font></h2>
             <br>
              <h2 align="left">Total time taken- <font color="indigo" face="Lucida Calligraphy">  <?php echo $time." "."min" ; ?></font></h2>

              </div>
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
