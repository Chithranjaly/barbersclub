<?php
session_start();
include "../../dbconnect.php";
$id=$_SESSION["id"];
$sql="update enquery set status='replied' where id=$id";
$run=mysqli_query($con,$sql);
if($run)
{
	 echo '<meta http-equiv="refresh" content="0;query.php">';
}
?>