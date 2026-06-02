<?php
include "../dbconnect.php";

$q="select max(id) as id from appoinment";
$re=mysqli_query($con,$q);
if($row=mysqli_fetch_array($re))
{
	$id=$row["id"];
}
$sql="select * from orders";
$run=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($run))
{
 $service=$row["service"];
 $rate=$row["rate"];
 $time=$row["time"];
 $sumrate=$row["sum_rate"];
 $sumtime=$row["sum_time"];	

 $sq="insert into bookservice(book_id,service,rate,time,sum_rate,sum_time)values('$id','$service','$rate','$time','$sumrate','$sumtime')";
 echo $sq;
 $r=mysqli_query($con,$sq);
}

?>