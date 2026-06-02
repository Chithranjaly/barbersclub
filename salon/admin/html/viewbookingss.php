<?php
include "header.php";
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">VIEW BOOKINGS</a>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Bookings</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
   <form action="#" method="POST">
    <br>
     <input type="radio" name="type" checked="" value="shop"><font color="indigo" face="Lucida Calligraphy">View Bookings for Shop services</font>
     <br>
     <input type="radio" name="type" value="home"><font color="indigo" face="Lucida Calligraphy">View Bookings for Home services</font>
     <br>
     <input type="submit" class="btn btn-primary btn-round" name="submit" value="Confirm">
   </form>
 <?php
if(isset($_POST["submit"]))
{
  $type=$_POST["type"];
  if($type=="shop")
  {
 echo '<meta http-equiv="refresh" content="0;viewshop.php">';
  }
  else
  {
     echo '<meta http-equiv="refresh" content="0;viewhome.php">';
  }

}

?>

                
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
     <?php
     include "footer.php";
     ?>



