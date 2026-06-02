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
        <a id="play-home-video" class="video-play-button" href="https://www.youtube.com/watch?v=vParh5wE-tM">
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
			<div class="row gutters-48">

 
<!--1 -->
	
				<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
					<div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              
              <h3>Hair Cut</h3>
              <p>Select services</p>
            </div>
            
            <ul class="card-pricing__list">
       <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="haircut[]" value="express">Express HairCut  -Rs.250</li>
              <li><input type ="checkbox" name="haircut[]" value="signature">signature Haircut  -Rs.300</li>
              <li><input type ="checkbox" name="haircut[]" value="extra deluxe">Extra deluxe HairCut  -Rs.450</li>
                  
            </ul>
						<div class="mb-5">
              <input type="submit" name="haircut" value="ADD">
							
						</div></form>
          </div>
        </div>

<!--2 -->
<?php
                $sql="select * from package";
                include "dbconnect.php";
                $result=mysqli_query($con,$sql);
                $i=0;
                while($row=mysqli_fetch_array($result))
                {
                    $i++;
                    if($i%2!=0)
                    {
                ?>  <div class="row gutters-48">
                  <?php
                  else
                  {
                   <div class="col-lg-4 col-md-6 mb-5 mb-lg-0"> 
                  }
                  ?>

  
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <img src="<?php echo $row['file']; ?>" >
              <h3><?php echo $row["p_name"]; ?></h3>
              <p><?php echo $row["description"]; ?></p>
            </div>
            
            <ul class="card-pricing__list">
                     <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="beardtrim[]" value="basic"> Basic Trimming  -Rs.150</li>
              <li><input type ="checkbox" name="beardtrim[]" value="specialised">Specialised styles  -Rs.200</li>
            
              
            </ul>
            <div class="mb-5">
            <input type="submit" name="beardtrim" value="ADD">
            </div></form>
          </div>
        </div>

<!--3 -->
<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <h3>Hair colouring</h3>
              <p>Select your suitable pack</p>
            </div>
            
            <ul class="card-pricing__list">
                      <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="haircolor[]" value="grey blending">15 Min Grey blending -Rs.250</li>
              <li><input type ="checkbox" name="haircolor[]" value="color enhancement">Color Enhancement -Rs.300</li>
              <li><input type ="checkbox" name="haircolor[]" value="permanent color">Permanent Hair Colour-Rs.600</li>
              <li><input type ="checkbox" name="haircolor[]" value="eyebrow mustache">Eyebrow / Mustache colur -Rs.100</li>
                        
            </ul>
            <div class="mb-5">
            <input type="submit" name="haircolor" value="ADD">
            </div></form>
          </div>
        </div>

<!--4 -->
<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <h3>Hair Straightening / Smoothening</h3>
              <p>Permanent Hair straightening will last upto 2 years.And temporary can last for only 6 months.Select suitable pack</p>
            </div>
            
            <ul class="card-pricing__list">
       <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="smoothening[]" value="permanent"> Permanent Hair smoothening -Rs.3000</li>
              <li><input type ="checkbox" name="smoothening[]" value="temporary">Temporary Hair smoothening  -Rs.1800</li>
              
              
            </ul>
            <div class="mb-5">
            <input type="submit" name="smoothening" value="ADD">
            </div></form>
          </div>
        </div>
 
<!--5 -->
<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <h3>Oil Massage for Hair</h3>
              <p>Oil Massage will promote your hair growth as well as provides you a great relaxation</p>
            </div>
            
            <ul class="card-pricing__list">
                      <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="massage[]" value="15 min"> 15 min oil massage  -Rs.250</li>
              <li><input type ="checkbox" name="massage[]" value="30 min"> 30 min oil massage  -Rs.400</li>
                          </ul>
            <div class="mb-5">
            <input type="submit" name="massage" value="ADD">
            </div></form>
          </div>
        </div>

<!--6 -->
<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <div class="card text-center card-pricing border-style">
            <div class="card-pricing__header">
              <h3>Skin care facialing</h3>
              <p>After these facial, your face will look more clear and bright</p>
            </div>
               <ul class="card-pricing__list">             
       <form name="service" method="POST" action="#">
              <li><input type ="checkbox" name="facial[]" value="gold">Gold facial -Rs.6000</li>
              <li><input type ="checkbox" name="facial[]" value="express">Express Refresher facial-Rs.1000</li>
              <li><input type ="checkbox" name="facial[]" value="rosewater">Rosewater facial-Rs.500</li>
              </ul>
            <div class="mb-5">
            <input type="submit" name="facial" value="ADD">
            </div></form>
          </div>
        </div>
        <div class="button button-service">
<form name="service" action="#" method="POST">
  <input type="submit" name="book" value="Book for shop service">
  <input type="submit" name="homebook" value="Book for Home Service">
  </form></div>



      
			</div>
		</div>
  </section>
</form>



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
							<a class="button button-service" href="#">Book Now</a>
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
							<a class="button button-service" href="#">Book Now</a>
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
							<a class="button button-service" href="#">Book Now</a>
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