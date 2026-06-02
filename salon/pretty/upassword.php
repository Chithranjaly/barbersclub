<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["userid"])) {
    header("location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

   <div class="hero-wrap js-fullheight" style="background-image: url('images/backheader2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <img src="img/logo4.jpg" alt="">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="#A68538">The Complete Men's Salon</font></h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://youtu.be/N16yoYslKoE" class="btn btn-white btn-outline-white px-4 py-3">View Our Services</a></p>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="userprofile.php" class="nav-link">User Profile</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Change Password</h2>
          </div>
        </div>

        <div class="col-md-6 ftco-animate">
          <form action="upassword.php" method="POST" class="contact-form">
            <div class="form-group">
              <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
            </div>
            <div class="form-group">
              <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
            </div>
            <div class="form-group">
              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Change Password" name="submit" class="btn btn-primary py-3 px-5">
              <a href="userprofile.php"><input type="button" value="Go Back"></a>
            </div>
          </form>
        </div>
      </div>
    </section>

<?php include "footer.php"; ?>

<?php
if (isset($_POST["submit"])) {
    $id               = $_SESSION["userid"];
    $current_password = $_POST["current_password"];
    $new_password     = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('New passwords do not match!')</script>";
    } else {
        include "../dbconnect.php";

        // FIXED: Fetch current hashed password using prepared statement
        $stmt = mysqli_prepare($con, "SELECT password FROM tbl_login WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row    = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        // FIXED: Verify the current password before allowing change
        if ($row && password_verify($current_password, $row["password"])) {
            $hashed_new = password_hash($new_password, PASSWORD_DEFAULT);

            // FIXED: Update with prepared statement
            $stmt = mysqli_prepare($con, "UPDATE tbl_login SET password = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($stmt, "si", $hashed_new, $id);
            $r = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($r) {
                echo "<script>alert('Password changed successfully!')</script>";
            } else {
                echo "<script>alert('Password change failed. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect!')</script>";
        }
    }
}
?>
