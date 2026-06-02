<?php
session_start();
include "header.php";
?>

  

    
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
         <div class="col-md-6 appointment pl-md-5 ftco-animate">
            <h3 class="mb-3">Please select a different time.</h3>


            <form action="#" method="POST" class="appointment-form">
              
              

                <div class="row form-group d-flex">
                <div class="col-md-6">
                  <select name="time">
                    <option value="" selected="" disabled="">--select a time--</option>
                    <option value="8">8:00 AM</option>
                     <option value="9">9:00 AM</option>
                      <option value="10">10:00 AM</option>
                       <option value="11">11:00 AM</option>
                        <option value="12">12:00 AM</option>
                       <option value="1">1:00 PM</option>
                        <option value="2">2:00 PM</option>
                         <option value="3">3:00 PM</option>
                          <option value="4">4:00 PM</option>
                           <option value="5">5:00 PM</option>
                            <option value="6">6:00 PM</option>
                             <option value="7">7:00 PM</option>
                            

                     </select>

         
             
              <div class="row form-group d-flex">
                  
              <div class="form-group">
                <br>
                <br>
                <input type="submit" name="submit" value="select" class="btn btn-white btn-outline-white py-3 px-4">
              </div>
            </form>

           
          </div>          
        </div>
            </form>
          </div>  

                
        </div>
      
          </div>

      </div>
    </section>

   <?php
     include "footer.php";
   ?>


   <?php

   if(isset($_POST["submit"]))
   {
 
    $id=$_SESSION["bookid"];
         

    $time=$_POST["time"];
    
    include "../dbconnect.php";

    
    $sql="update appoinment set time='$time' where id=$id";
    $q=mysqli_query($con,$sql);

    if($q)
    {
      include "check.php";
             

    }
    else
    {
      echo "<script>alert('Something went wrong!!!!!!!!!!!Please try again')</script>";
    }
      
   }
   
?>