<?php
$id=$_GET["id"];
include "../dbconnect.php";
$sql="delete from appoinment where id=$id";
$run=mysqli_query($con,$sql);
if($run)
{
	echo '<meta http-equiv="refresh" content="0;viewbookings.php">';
}
?>