<?php
include "header.php";
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">EDIT WORKERS</a>
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
                    $sql="select * from workers where w_id='$id'";
                    $result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
  
  ?>
 
          <table>
            <tr><td>Worker id</td><td><input type="text" name="w_id" readonly="" value="<?php echo $row['w_id']; ?>"></td></tr>
          <tr><td>Worker Name</td><td><input type="text" name="w_name" placeholder="Enter worker name" value="<?php echo $row['w_name']; ?>"></td></tr>
          <tr><td>Description</td><td><input type="text" name="description" placeholder="Enter decription" value="<?php echo $row['description']; ?>"></td></tr>
          <tr><td>Upload Image</td><td><input type="file" name="fileToUpload" value="<?php echo $row['photo']; ?>" id="fileToUpload"accept="image/*" onchange="loadFile(event)">
          </td></tr><?php
        } ?>
  
          
          
           <tr><td><input type="submit" class="btn btn-primary btn-round" value="Update Workers" name="submit" ></td></tr>
          </table>
        
        <a href="viewworkers.php"><input type="button" class="btn btn-primary btn-round" name="home" value="GO BACK"></a>
        
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
  $wname=$_POST["w_name"];
  $description=$_POST["description"];
$filename=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
 {
    echo "The file ". $filename . " has been uploaded.";
    include "../../dbconnect.php";
    $sql="update workers set w_name='$wname',description='$description',photo='$filename' where w_id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
       echo "<script>alert('Successfully updated')</script>";
    }
   else
   {
    echo "<script>alert('Updation failed')</script>";
   }
 }}

?>


