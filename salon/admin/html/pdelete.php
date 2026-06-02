
                    <?php
                    
                    $id=$_GET["id"];
                    include "../../dbconnect.php";
                    $sql="delete from package where pack_id=$id";
                    $result=mysqli_query($con,$sql);
                    if($result)
                    {
                      echo "<script>alert('Deleted the package with id=$id')</script>";
                       echo '<meta http-equiv="refresh" content="0;viewpackage.php">';
                    }

?>