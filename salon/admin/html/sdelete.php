
                    <?php
                    
                    $id=$_GET["id"];
                    include "../../dbconnect.php";
                    $sql="delete from service where service_id=$id";
                    $result=mysqli_query($con,$sql);
                    if($result)
                    {
                      echo "<script>alert('Deleted the service with id=$id')</script>";
                       echo '<meta http-equiv="refresh" content="0;viewservice.php">';
                    }

  ?>
 



