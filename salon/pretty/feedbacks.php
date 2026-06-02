<?php
session_start();
include "header.php";
?>

  <!-- ================ end header Area ================= -->
	
  <!-- ================ start banner area ================= -->
	<section class="banner-area contact" id="contact">
		<div class="container h-100">
			<div class="banner-area__content text-center">
        <h1>FEEDBACKS</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php
              ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
          </ol>
        </nav>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

	<!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
       


      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
      
        </div>
        <div class="col-md-8 col-lg-9">
          <form name="register" action="#" class="form-contact contact_form" action="contact_process.php" method="POST" id="contactForm" novalidate="novalidate">
            <h4>Send us your feedbacks</h4>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your Name">
                </div>
                
               <div class="form-group">
                    <textarea class="form-control different-control w-100" name="feedback" id="feedback" cols="30" rows="5" placeholder="Enter your feedbacks"></textarea>
                </div>
                
                
             
                
        </div>
            </div>
            <div class="form-group text-center text-md-left mt-3">
              <input type="submit" name="submit" value="Send us" class="button">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
   

  <?php
  include "footer.php";
  ?>

 
  <?php
  if(isset($_POST["submit"]))
  {
    $name=$_POST["name"];
    $feedback=$_POST["feedback"];
    include "../dbconnect.php";
     $id= $_SESSION["userid"];
       $query="insert into feedback(user_id,name,feedback)values('$id','$name','$feedback')";
   $run=mysqli_query($con,$query);
   if($run)
   {
     echo"<script>alert('Feedbacks Sent successfully')</script>";
   }
   else
   {
    
      echo"<script>alert('Feedbacks senting failed')</script>";
    }
   

  }
  ?>