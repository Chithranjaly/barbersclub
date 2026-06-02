<?php
session_start();
include "header.php";
?>

  

    
    <section class="ftco-section ftco-appointment">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
         <div class="col-md-6 appointment pl-md-5 ftco-animate"><a href="../chat/index.php"><font color="cyan" size="5" face="Lucida Calligraphy">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp chat with our workers!!!</font></a>
<br>
            <h3 class="mb-3">Make an appointment</h3>

            <form action="#" method="POST" class="appointment-form">
             
              <div class="row form-group d-flex">
                 

                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" required="" placeholder="Name">
                </div>
              </div>

            



              <div class="row form-group d-flex">
                <div class="col-md-6">
                  <div class="input-wrap">
                   
                    <input type="date" id="datemin" name="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required="" placeholder="Date">
                  </div>
                </div>
                </div>

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

         
             </div></div>
            <div class="row form-group d-flex">
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" required="" placeholder="Phone">
                </div>
              </div>
              <div class="row form-group d-flex">
                  
              <div class="form-group">
                <input type="submit" name="submit" value="Order" class="btn btn-white btn-outline-white py-3 px-4">
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
$id= $_SESSION["userid"];
   if(isset($_POST["submit"]))
   {

          $amount=$_SESSION["totalrate"];
       
    $name=$_POST["name"];
    $date=$_POST["date"];
    $date=str_replace('/','-',$date);
    $datee=date('Y-m-d',strtotime($date));
    $time=$_POST["time"];
    $phone=$_POST["phone"];
    include "../dbconnect.php";

    
    $sql="insert into appoinment(user_id,name,date,time,phone,amount) values('$id','$name','$datee','$time','$phone','$amount')";
    $q=mysqli_query($con,$sql);

    if($q)
    {
      
       echo '<meta http-equiv="refresh" content="0;ask.php">';

    }
    else
    {
      echo "<script>alert('Something went wrong!!!!!!!!!!!Please try again')</script>";
    }
      
   }
   
?>