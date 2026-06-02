 <?php
 $id=$_SESSION["bookid"];
 include "../dbconnect.php";
  $sq="select date,time from appoinment where id=$id";
     $r=mysqli_query($con,$sq);
     while($ro=mysqli_fetch_array($r))
     {
      $date=$ro["date"];
      $time=$ro["time"];
     }
include "../dbconnect.php";

      $sq="select name from appoinment where date='$date' and time='$time' and type='shop' and  id <> $id";
      $run=mysqli_query($con,$sq);
      $row=mysqli_fetch_array($run);
      if($row)
        {
          echo "<script>alert('Sorry,We have already an appointment at this time.Please select a different time')</script>";
           echo '<meta http-equiv="refresh" content="0;time.php">';

        }
         else
        {
           echo '<meta http-equiv="refresh" content="0;shopbook.php">';
        }
        ?>