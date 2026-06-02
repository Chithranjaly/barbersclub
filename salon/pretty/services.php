  <?php
  session_start();
  include "header.php";
  ?> 



  <section class="video-area section-margin--large">
    <section><div id="background">
  <p><br><br><br></br></p>
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column text-center">
          <h3>View Our Work</h3>
          <a id="play-home-video" class="video-play-button" href="https://youtu.be/e2qCOEiapXE">
            <img src="img/home/play-icon.png" alt="">
          </a>
          <p>05:35</p>
        </div>
      </div> 
</div></div> 
    </section>
</section>




   <form name="service" action="#" method="POST">
    <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Beauty Pricing</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
            
            <?php
            include "../dbconnect.php";
            $sql="select *from package";
            $query=mysqli_query($con,$sql);
            $v=0;
            while($row=mysqli_fetch_array($query))
            { 
                $v++;
                $pname=$row["p_name"];
                if($v>4)
                {
                    echo "<div class='row'>";
                }
                else
                {
                    echo "<div class='col-md-3 ftco-animate'>";
                }
                ?>
          
        
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h2 class="mb-4"><a id="a$n"> <?php echo $row["p_name"];  ?></a> </h2>
                        <h4> <?php echo $row["description"];  ?></h4>

                    </div>
                    <ul>
                        
                        <?php
                        include "../dbconnect.php";
                        $q="select * from service where p_name='$pname' ";
                        $run=mysqli_query($con,$q);
                        while($ro=mysqli_fetch_array($run))
                        {
                            ?>
                        <hr>
                        <li><input type="checkbox" name="service[]" value="<?php echo $ro['service_name']; ?>"><?php echo $ro["service_name"]; ?>&nbsp &nbsp -<?php echo $ro["service_rate"]; ?></li>

                            
                               
                               
                               
                            <?php }  ?>
                          
                    </ul>
                  
                </div>
                
            </div>
        
          
             <?php  }  ?>



        </div>
           
            
        </div>
             <div class="row justify-content-center mb-5 pb-3">
             <div class="col-md-7 heading-section text-center ftco-animate">
                 <input type="submit" name="submit" value="Book" width="15" class="btn btn-primary">

            <!-- <a href="bookings.php" ><input type="button" name="shop" value="Book For SHOP service" class="btn btn-primary"></a>
          <a href="bookings.php" ><input type="button" name="home" value="Book For HOME service" class="btn btn-primary"></a> -->
      </div></div> 
        </section>
       
           </form>




 
<?php
    if(isset($_POST["submit"]))

    { 
      include "../dbconnect.php";
      $sql="select * from orders";
      $run=mysqli_query($con,$sql);
      if($run)
      {
        $sqll="delete from orders";
        $runn=mysqli_query($con,$sqll);
      }
        
        if(!empty($_POST['service']))
        { 
          $service_array=array();
            $_SESSION["services"]=$service_array;
            foreach($_POST['service'] as $selected) 
            {
              $service_array[]=$selected;
                include "../dbconnect.php";
             $sql="insert into orders(service)values('$selected')";
             $run=mysqli_query($con,$sql);
          
           }

        } 
          
        ?>
<?php
include "../dbconnect.php";
$sql="select s.service_name,s.service_rate,s.time,o.service from service s,orders o where service=service_name";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query))
{ 
    $service=$row["service_name"];
 $rate=$row["service_rate"];
  $time=$row["time"];


    
 $s="update orders set rate='$rate',time='$time' where service='$service'";
 $r=mysqli_query($con,$s);  
}

 
 
$sql="select SUM(rate) as 'sumrate' from orders";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_array($result);
$val1=$value["sumrate"];
$_SESSION["totalrate"]=$val1;

$sql="select SUM(time) as 'sumtime' from orders";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_array($result);
$val2=$value["sumtime"];
$_SESSION["totaltime"]=$val2;

$sql="update orders set sum_rate=$val1,sum_time=$val2";
$result=mysqli_query($con,$sql);
 

 if($r)
 {
   
     echo '<meta http-equiv="refresh" content="0;bookings.php">';
 }
 else
 {
    echo "<script>alert('failed')</script>";
     echo '<meta http-equiv="refresh" content="0;services.php">';
 } 

 }
    ?> 
      
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
                <a href="#" class="work-entry">
                    <img src="../uploads/<?php echo $row["file"]; ?>" width="400" height="400" class="img-fluid" alt="Colorlib Template">
                    <div class="info d-flex align-items-center">
                        <div>
                            
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
    <?php
    include "footer.php";

    ?>

