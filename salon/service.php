<?php
include "header.php";
?><!-- ================ end header Area ================= -->
  <!-- ================ start banner area ================= -->
	<section class="banner-area service" id="service">
		<div class="container h-100">
			<div class="banner-area__content text-center">
        <h1>Our Service</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Service</li>
          </ol>
        </nav>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= --> 


 <!-- ================ video section start ================= -->

	<section class="video-area section-margin--large">
		<div class="container">
			<div class="row justify-content-center align-items-center flex-column text-center">
				<h3>View Our Work</h3>
        <a id="play-home-video" class="video-play-button" href="https://www.youtube.com/watch?v=Gb6LeDNLhak">
					<img src="img/home/play-icon.png" alt="">
        </a>
				<p>05:35</p>
			</div>
		</div>	
	</section>
  <!-- ================ video section end ================= -->	

  <!-- ================ pricing section start ================= -->      
  <section class="section-margin--large">
    <div class="container">
      <div class="section-intro pb-70px">
        <h4 class="section-intro__title">Our Services & Pricing Plan</h4>
        <h3 class="section-intro__subtitle">Choose Your Favorite <span class="d-block">Package</span></h3>
			</div>
       <form name="service" method="POST" action="#">
			<div class="row gutters-48">


	

                <?php

                include "dbconnect.php";
                $sql="select * from Package";
           
                $result=mysqli_query($con,$sql);
                $i=0;
                while($row=mysqli_fetch_array($result))
                {
                 $pname=$row["p_name"];  
                ?>
  <div class="col-lg-4 col-md-6 mb-5 mb-lg-0" width="200" height="300">
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <h3><?php echo $row["p_name"]; ?>  </h3>
              <h5><?php echo $row["description"]; ?> </h5>

            
            </div>
            
            <ul class="card-pricing__list">
                    
                      <?php
                      include "dbconnect.php";
                      $s="select * from service where p_name='$pname' ";
                      $run=mysqli_query($con,$s);
                      while($row=mysqli_fetch_array($run))
                      { ?>

                    
              <li><input type ="checkbox" name="service" value="<?php echo $row['service_name']; ?>"><?php echo $row["service_name"]; ?>&nbsp &nbsp  -<?php echo $row["service_rate"]; ?></li>
          
              <?php  }  ?>
            
         
            </ul>

                    </div>

        </div>
         <?php    }  ?>

        

</ul></div>
       

       <input type="submit" name="shop" value="Book for Shop service" class="btn btn-primary">
    <input type="submit" name="home" value="Book for Home service" class="btn btn-primary">
  </form>



      
			</div>
		</div>
  </section>

<?php
if(isset($_POST["home"])||isset($_POST["shop"]))
{
  echo "<script>alert('Please Register before booking')</script>";
  echo '<meta http-equiv="refresh" content="0;registration.php">';
}
?>

  <!-- ================ service section start ================= -->      
	<section class="section-margin--large">
    <div class="container">
      <div class="section-intro pb-70px">
        <h4 class="section-intro__title">Our Combo Services</h4>
        <h2 class="section-intro__subtitle">Our Strength Is Your <span class="d-block">Smart beauty</span></h2>
			</div>
			<div class="row gutters-48 card-service-wrapper">
				<div class="col-lg-4">
					<div class="card text-center card-service border-style">
            <div class="card-service__icon"><i class="flaticon-cut"></i></div>
            <h3 class="card-service__title">Ultimate Combo</h3>
						<p>Haircut + Shaving + Skin lightening face cleanup(30 min) + Head massage-Olive oil </p>
            <p>Actual Price   :<strike>Rs.640</strike></p><p>On discount   :Rs.499</p>
            <h4>You Save-</h4><h3>Rs.141</h3>
						<div>
							<a class="button button-service" href="registration.php">Book Now</a>
						</div>
          </div>
				</div>
				<div class="col-lg-4">
					<div class="card text-center card-service border-style">
            <div class="card-service__icon"><i class="flaticon-wellness"></i></div>
            <h3 class="card-service__title">Express Combo</h3>
						<p>Haircut + Skin lightening face cleanup(30 min) + Hair spa short & medium</p>
            <p>Actual Price   :<strike>Rs.1018</strike></p><p>On discount   :Rs.799</p>
            <h4>You Save-</h4><h3>Rs.219</h3>
						<div>
							<a class="button button-service" href="registration.php">Book Now</a>
						</div>
          </div>
				</div>
				<div class="col-lg-4">
					<div class="card text-center card-service border-style">
            <div class="card-service__icon"><i class="flaticon-shower"></i></div>
            <h3 class="card-service__title">Silver Combo</h3>
						<p>Haircut + Gold facial + Hair spa short & medium </p>
            <p>Actual Price   :<strike>Rs.1670</strike></p><p>On discount   :Rs.1252</p>
            <h4>You Save-</h4><h3>Rs.304</h3>
						<div>
							<a class="button button-service" href="registration.php">Book Now</a>
						</div>
          </div>
				</div>
			</div>
		</div>
  </section>
  <!-- ================ service section end ================= -->
  <!-- ================ pricing section end ================= -->    


 <?php
 include "footer.php";
 ?>