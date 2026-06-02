<?php
include "header.php";
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
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
                  <h4 class="card-title"><font color="white" face="Lucida Calligraphy">Services selected</font></h4>
                   <p class="card-category"></p>
               

                  </div>
                <div class="card-body">
                  <ul type="disk">


      <?php
      $id=$_GET["id"];
      include "../../dbconnect.php";
      $sql="select * from bookservice where book_id='$id'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
  ?> 
                    <li><font size="4" color="indigo" face="Lucida Calligraphy"><?php echo $row["service"]; ?></font></li><br>
                 
                   
     <?php }?>
      </ul>
  <form>
        <a href="viewhome.php"><input type="button" class="btn btn-primary btn-round" name="submit" value="Back"></a>
      </form>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>



                
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
     <?php
     include "footer.php";
     ?>



