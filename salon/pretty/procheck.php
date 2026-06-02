 <?php
 session_start();
 $username = "";

 if (isset($_POST['submit']))
     {
     $username = $_POST["username"];
     $password = $_POST["password"];
     $_SESSION["username"] = $found_admin["username"];
     if (isset($_SESSION["username"]));
     {
     redirect_to("index.php");
     }
      else
    {
    $_SESSION["message"] = "Username/password not found.";
    }
    }

 ?>


 <?php include("login.html"); ?>