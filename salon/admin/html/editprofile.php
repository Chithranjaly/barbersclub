<?php
session_start();
include "header.php";
?>
<html>
<body>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">USER PROFILE</a>
           
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
<?php
include "../../dbconnect.php";
$id=$_SESSION["userid"];
$sql="select username from tbl_login where user_id=$id";
$run=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($run))
{
  ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="#" method="POST">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company (disabled)</label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username"  value="<?php echo $row['username']; ?> " class="form-control"> 
                    <?php } ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email"  class="form-control" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" name="fname" class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" class="form-control" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address"  class="form-control" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" name="country"  class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" name="po"  class="form-control" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                           
                            <textarea name="about" class="form-control" rows="5" ></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                     
                    <a href="editprofile.php"><button type="submit" name="submit" class="btn btn-primary pull-right">Edit Profile</button></a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../img/team/team1.png" width="200" height="200" alt="" />
                  </a>
                </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body></html>
<?php 
      include "footer.php";
      ?>

      <?php
      if(isset($_POST["submit"]))
      {

      $username=$_POST["username"];
      $email=$_POST["email"];
      $fname=$_POST["fname"];
      $lname=$_POST["lname"];
      $address=$_POST["address"];
      $city=$_POST["city"];
      $country=$_POST["country"];
      $po=$_POST["po"];
      $about=$_POST["about"];
      include "../../dbconnect.php";
      $sql="insert into adminprofile(username,email,fname,lname,address,city,country,postal_code,about_me) values('$username','$email','$fname','$lname','$address','$city','$country','$po','$about')";
      $run=mysqli_query($con,$sql);
      if($run)
      {
        echo "<script>alert('Successfully updated')</script>";
      }
      else
       {
        echo "<script>alert('Updation failed')</script>";
      }
           }
?>