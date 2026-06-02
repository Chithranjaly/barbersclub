<?php
include "header.php";
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">EDIT SERVICES</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
             
             
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                 
                  <a class="dropdown-item" href="changepassword.php">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../login.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Update deatails</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                     <?php
                    include "../../dbconnect.php";
                    $id=$_GET["id"];
                    $sql="select * from service where service_id='$id'";
                    $result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
  
  ?> <tr><td>Package Name</td><td><input type="text" readonly="" name="packname" value="<?php echo $row['p_name']; ?>"></td></tr><?php } ?>
 
          <table>
             <tr><td>Select package:<select name="pname"><option disabled="" selected="">--Select Package--</option>


                    <?php 
                    include "../../dbconnect.php";
                    $sql="select p_name from package";
                    $run=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($run))
                    {
                      echo "<option value='".$row['p_name']."'>".$row['p_name']."</option>";
                    }
 ?></select></td></tr>
           
           <?php
                    include "../../dbconnect.php";
                    $id=$_GET["id"];
                    $sql="select * from service where service_id='$id'";
                    $result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
  
  ?>

            <tr><td>Service id</td><td><input type="text" name="service_id" readonly="" value="<?php echo $row['service_id']; ?>"></td></tr>
          <tr><td>Service Name</td><td><input type="text" name="service_name" placeholder="Enter service name" value="<?php echo $row['service_name']; ?>"></td></tr>
        <tr><td>Time</td><td><input type="number" name="time" placeholder="duration of service" value="<?php echo $row['time']; ?>"></td></tr>
          <tr><td>Service Rate</td><td><input type="text" name="rate" placeholder="Enter service rate" value="<?php echo $row['service_rate']; ?>"></td></tr>
          <?php
        } ?>
  
          
          



           <tr><td><input type="submit" class="btn btn-primary btn-round" value="Update service " name="submit" ></td></tr>
          </table>
        
        <a href="viewservice.php"><input type="button" class="btn btn-primary btn-round" name="home" value="GO BACK"></a>
        
        </form>

                
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/barber.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-category text-blue">The Barber Club</h4>
                  <h6 class="card-title">The complete men's salon</h6>
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php
     include "footer.php";
     ?>

     <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

<?php
if(isset($_POST["submit"]))
{
  $pname=$_POST["pname"];
  $sname=$_POST["service_name"];
  $time=$_POST["time"];
  $rate=$_POST["rate"];


    include "../../dbconnect.php";
    $r="update service set p_name='$pname',service_name='$sname',time='$time',service_rate='$rate' where service_id=$id";
    $result=mysqli_query($con,$r);
    if($result)
    {
       echo "<script>alert('Successfully updated')</script>";
       echo '<meta http-equiv="refresh" content="0;viewservice.php">';
    }
   else
   {
    echo "<script>alert('Updation failed')</script>";
   }
 }

?>


