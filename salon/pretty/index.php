<?php
include "header.php";
?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex mb-3"><span class="flaticon-facial-treatment"></span></div>
              <div class="media-body">
                <h3 class="heading">Skin &amp; Beauty Care</h3>
                <p>This will be the best place for creating your gorgeous look, with all clean and neat .Definitely,you will surprised by visiting our shop</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex mb-3"><span class="flaticon-cosmetics"></span></div>
              <div class="media-body">
                <h3 class="heading">Makeup Pro</h3>
                <p>We priovide you the best services with our branded equipments,we had all the facilities for your better experience and not to dissapoint you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex mb-3"><span class="flaticon-curl"></span></div>
              <div class="media-body">
                <h3 class="heading">Hair Style</h3>
                <p>We had the stylists who will make you better look and be confident with us,we will make you beautifull, just within affordable packages.</p>
              </div>
            </div>    
          </div>                                            
        </div>
    	</div>
    </section>

 
    <section class="ftco-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Beauty Experts</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
          <?php
                $sql="select * from workers";
                include "../dbconnect.php";
                $result=mysqli_query($con,$sql);
                $i=0;
                while($row=mysqli_fetch_array($result))
                {
                    $i++;
                    if($i%3!=0)
                    {
                ?>
            <div class="row">
            <?php
            }
            else
            {
                echo "<div class='col-lg-3 d-flex mb-sm-4 ftco-animate'>";
            }
            ?>
  <h1>0<?php echo $i; ?></h1>
        		<div class="staff">
             
      				<img src="../admin/html/<?php echo $row['photo']; ?>" width="90" height="90" alt="">
      				<div class="info text-center">
      					<h3><a href="teacher-single.html"><?php echo $row["w_name"]; ?></a></h3>
      					<span class="position">Stylist</span>
      					<div class="text">
	        				<p><?php echo $row["description"]; ?></p>
	        			</div>
      				</div>
        		</div>
        	</div>

        	
        
    <?php    }  ?>
        </div>
       <div id="myDIV"><a href="../chat/index.php"><font  color="Blue" size="5" face="Lucida Calligraphy">chat with our workers!!!</font></a></div>
      </div>
    </section>

		<section class="ftco-section ftco-discount img" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-5 discount ftco-animate">
						<h3>Save up to 25% Off</h3>
						<h2 class="mb-4">Student Discount</h2>
						<p class="mb-4">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
						<p><a href="services.php" class="btn btn-white btn-outline-white px-4 py-3">Book Now</a></p>
					</div>
				</div>
			</div>
		</section>

   <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Work</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>

 
<div class="row">
 <?php
                $sql="select * from package";
                include "../dbconnect.php";
                $result=mysqli_query($con,$sql);
                $i=0;
                while($row=mysqli_fetch_array($result))
                {
                    $i++;
                    $n=$i;
                ?>
            <div class="col-md-4 ftco-animate">
                <a href="services.php" class="work-entry">
                    <img src="../uploads/<?php echo $row["file"]; ?>" width="400" height="400" class="img-fluid" alt="Colorlib Template">
                    <div class="info d-flex align-items-center">
                        <div>
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                              <span class="icon-search"></span>
                            </div>
                            <h3><?php echo $row["p_name"]; ?></h3>
                           
                        </div>
                    </div>
                </a>
            </div>
<?php 
}
?>
          
        </div>
    </section>


<section >
    

    <section class="ftco-partner bg-light">
    	<div class="container">
    		<div class="row partner justify-content-center">
    			<div class="col-md-10">
    				<div class="row">
		        	<div class="col-md-3 ftco-animate">
		        		<a href="#" class="partner-entry">
		        			<img src="images/partner-1.jpg" class="img-fluid" alt="Colorlib template">
		        		</a>
		        	</div>
		        	<div class="col-md-3 ftco-animate">
		        		<a href="#" class="partner-entry">
		        			<img src="images/partner-2.jpg" class="img-fluid" alt="Colorlib template">
		        		</a>
		        	</div>
		        	<div class="col-md-3 ftco-animate">
		        		<a href="#" class="partner-entry">
		        			<img src="images/partner-3.jpg" class="img-fluid" alt="Colorlib template">
		        		</a>
		        	</div>
		        	<div class="col-md-3 ftco-animate">
		        		<a href="#" class="partner-entry">
		        			<img src="images/partner-4.jpg" class="img-fluid" alt="Colorlib template">
		        		</a>
		        	</div>
	        	</div>
	        </div>
        </div>
    	</div>
    </section>

		

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-flower"></span></div>
		              	<span>Makeup Over Done</span>
		                <strong class="number" data-number="3500">0</strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-flower"></span></div>
		              	<span>Procedure</span>
		                <strong class="number" data-number="1000">0</strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-flower"></span></div>
		              	<span>Happy Client</span>
		                <strong class="number" data-number="3000">0</strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-flower"></span></div>
		              	<span>Skin Treatment</span>
		                <strong class="number" data-number="900">0</strong>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Recent from blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="https://skinkraft.com/blogs/articles/hair-growth">How Your Hair Growth Can Be Faster With These Simple Tips!</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="https://www.thetrendspotter.net/popular-mens-haircuts/">30 POPULAR MEN’S HAIRCUTS AND HAIRSTYLES FOR 2020</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="https://www.goodhousekeeping.com/beauty/anti-aging/a34301/best-skin-care-tips/">15 Dermatologist-Approved Skincare Tips for the Best Skin of Your Life</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </section>

		
		
   <?php
   include "footer.php";
   ?>