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
                  <h4 class="card-title"><font color="white" face="Lucida Calligraphy">Bookings for Home service</font></h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                   <table id="example">
    <thead>
      <tr><th></th><th>USER ID</th><th>Name</th><th>Date</th><th>Time</th><th>phone</th><th>Landmark</th><th>Street name</th><th>Payment status</th></tr>
    </thead>
    <tbody>
      <?php
      include "../../dbconnect.php";
      $sql="select * from appoinment where type='home'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
   $time=$row["time"];
   $pay=$row["payment_status"];
      ?>
      <tr><td><a href="home.php?id=<?php echo $row["id"]; ?>">DETAILS</a></td><td><?php echo $row["user_id"]; ?></td><td><?php echo $row["name"]; ?></td><td><?php echo $row["date"]; ?>
        <?php
                if(($time>8)&&($time<12))
                {
                  $ap="AM";
                }
                else
                {
                  $ap="PM";
                }
                ?>
      </td><td><?php echo $row["time"].":00"." ".$ap ; ?></td><td>
        <?php echo $row["phone"]; ?>
         <?php
                if($pay=="paid")
                {
                  $ap="Paid Online";
                }
                else
                {
                  $ap="Not paid";
                }
                ?>
      </td></td><td><?php echo $ap; ?></td>
      <td><?php echo $row["landmark"]; ?> </td>
      <td><?php echo $row["street"]; ?> </td></tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <form>
        <a href="viewbookingss.php"><input type="button" class="btn btn-primary btn-round" name="submit" value="Back"></a>
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



