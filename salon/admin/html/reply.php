<?php
session_start();
include "header.php";
         $id=$_GET["id"];
$_SESSION["id"]=$id;
         ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">REPLY HERE</a>
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
                  <h4 class="card-title">Reply for the enqueries</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="emailer/emailer.php" method="POST" enctype="multipart/form-data">
 
 
    
          <table>

          <tr><td>reply</td><td><textarea name="reply"></textarea></td></tr>
          <?php
          include "../../dbconnect.php";
          $sql="select * from enquery where id=$id";
          $run=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($run))
          {
            ?>
         
          <td><input type="text" hidden="" name="email" value="<?php echo $row['email']; ?> "></td>
           <tr><td><input type="submit" class="btn btn-primary btn-round" value="REPLY " name="submit" ></td></tr>
          <?php  }  ?>
          </table>
        
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



