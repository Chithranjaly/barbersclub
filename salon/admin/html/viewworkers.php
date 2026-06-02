<?php
include "header.php";
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">VIEW WORKERS</a>
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
                  <h4 class="card-title ">View Workers</h4>
                   <p class="card-category">These are the workers that you had entered.You can edit/delete,if you want</p>
                  </div>

                  <div class="card-body">
                   <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                   
                      <tr>
      <th></th><th></th><th>Worker ID</th><th>Worker Name</th><th>Description</th><th>photo</th>
    </tr></thead><tbody>
    <?php
    include "../../dbconnect.php";
    $sql="select * from workers";
    $run=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run))
    { 
  ?>  <tr><td><a href="wedit.php?id=<?php echo $row["w_id"]; ?>">EDIT</a></td>
     <td><a href="wdelete.php?id=<?php echo $row["w_id"]; ?>">DELETE</a></td>
<td><?php echo $row["w_id"]; ?></td>
    <td><?php echo $row["w_name"];  ?></td>
    <td><?php echo $row["description"];  ?></td>
    <td><img src="<?php echo $row['photo']; ?>" width="90" height="90" alt=""></td>
    
  </tr>
<?php
  }
?>

                     </tbody>
                    </table>
                   </div>
                 </div>

               </div>
             </div>
           </div>
         </div>
      </div>
      

      <?php
      include "footer.php";
      ?>