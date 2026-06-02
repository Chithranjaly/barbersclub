
                    <?php
                    
                    $id=$_GET["id"];
                    include "../../dbconnect.php";
                    $query="select name from tbl_user_register where user_id=$id";
                    $r=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($r))
                    {
                      $name=$row["name"];
                    }
                    $sql="delete from tbl_user_register where user_id=$id";
                    $result=mysqli_query($con,$sql);
                    if($result)
                    {

                      $sq="delete from tbl_login where user_id=$id";
                      $ru=mysqli_query($con,$sq);
                      if($ru)
                      {
                           echo "<script>alert('Deleted the user with name=$name')</script>";
                       echo '<meta http-equiv="refresh" content="0;viewusers.php">';
                      }
                   
                    }

  ?>
  