<?php
include "header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function checkForm(form) {
    if (form.name.value == "") {
      alert("Error: Name cannot be blank!");
      form.name.focus();
      return false;
    }
    if (form.password.value == "") {
      alert("Error: Password cannot be blank!");
      form.password.focus();
      return false;
    }
    if (form.password.value.length < 5) {
      alert("Error: Password must contain at least 5 characters!");
      form.password.focus();
      return false;
    }
    var re = /[0-9]/;
    if (!re.test(form.password.value)) {
      alert("Error: Password must contain at least one number (0-9)!");
      form.password.focus();
      return false;
    }
    re = /[a-z]/;
    if (!re.test(form.password.value)) {
      alert("Error: Password must contain at least one lowercase letter (a-z)!");
      form.password.focus();
      return false;
    }
    re = /[A-Z]/;
    if (!re.test(form.password.value)) {
      alert("Error: Password must contain at least one uppercase letter (A-Z)!");
      form.password.focus();
      return false;
    }
    re = /^\d{10}$/;
    if (!re.test(form.phone.value)) {
      alert("Error: Phone must contain 10 digits!");
      return false;
    }
    if (form.location.value == "") {
      alert("Error: Location cannot be blank!");
      form.location.focus();
      return false;
    }
    if (form.landmark.value == "") {
      alert("Error: Landmark cannot be blank!");
      form.landmark.focus();
      return false;
    }
    if (form.address.value == "") {
      alert("Error: Address cannot be blank!");
      form.address.focus();
      return false;
    }
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(form.email.value)) {
      return true;
    } else {
      alert("You have entered an invalid email address!");
      return false;
    }
  }
</script>

<!-- ================ start banner area ================= -->
<section class="banner-area contact" id="contact">
  <div class="container h-100">
    <div class="banner-area__content text-center">
      <h1>REGISTRATION</h1>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registration</li>
        </ol>
      </nav>
    </div>
  </div>
</section>
<!-- ================ end banner area ================= -->

<!-- ================ contact section start ================= -->
<section class="section-margin">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0"></div>
        <div class="col-md-8 col-lg-9">
          <a href="login.php">Already registered? Login</a>
          <form onsubmit="return checkForm(this);" name="register" action="registration.php" class="form-contact contact_form" method="POST" id="contactForm">
            <h4>Register here with your details</h4>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" required type="text" placeholder="Enter your Name">
                </div>
                <div class="form-group">
                  <input class="form-control" name="phone" id="phone" required type="text" placeholder="Enter your phone number">
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" required type="email" placeholder="Enter email id">
                </div>
                <div class="form-group">
                  <input class="form-control" name="location" id="location" required type="text" placeholder="Enter location">
                </div>
                <div class="form-group">
                  <input class="form-control" name="landmark" id="landmark" required type="text" placeholder="Enter your landmark">
                </div>
                <div class="form-group">
                  <textarea class="form-control different-control w-100" name="address" required id="message" cols="30" rows="5" placeholder="Enter Your Address"></textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" name="password" required id="password" type="password" placeholder="Create Password">
                </div>
                <div class="form-group">
                  <input class="form-control" name="cpassword" id="cpassword" type="password" placeholder="Confirm Password">
                </div>
                <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"></div>
              </div>
            </div>
            <div class="form-group text-center text-md-left mt-3">
              <input type="submit" name="submit" value="Register" class="button">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include "footer.php"; ?>

<script>
  function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#cpassword").val();
    if (password != confirmPassword)
      $("#CheckPasswordMatch").html("Passwords do not match!");
    else
      $("#CheckPasswordMatch").html("Passwords match.");
  }
  $(document).ready(function () {
    $("#cpassword").keyup(checkPasswordMatch);
  });
</script>

<?php
if (isset($_POST["submit"])) {
    $name     = trim($_POST["name"]);
    $phone    = trim($_POST["phone"]);
    $email    = trim($_POST["email"]);
    $location = trim($_POST["location"]);
    $landmark = trim($_POST["landmark"]);
    $address  = trim($_POST["address"]);
    $password = $_POST["password"];

    include "dbconnect.php";

    // FIXED: Check if email already exists using prepared statement
    $stmt = mysqli_prepare($con, "SELECT user_id FROM tbl_login WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('Email already registered. Please login.')</script>";
        mysqli_stmt_close($stmt);
    } else {
        mysqli_stmt_close($stmt);

        // FIXED: Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // FIXED: Insert login record with prepared statement
        $stmt = mysqli_prepare($con, "INSERT INTO tbl_login(username, password, usertype) VALUES(?, ?, 'user')");
        mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);
        $run = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($run) {
            // Get the new user's ID
            $new_id = mysqli_insert_id($con);

            // FIXED: Insert user profile with prepared statement
            $stmt = mysqli_prepare($con, "INSERT INTO tbl_user_register(name, phone, email, address, user_id, location, landmark) VALUES(?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssssss", $name, $phone, $email, $address, $new_id, $location, $landmark);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "<script>alert('Registration successful! Please login.')</script>";
            echo '<meta http-equiv="refresh" content="0;login.php">';
        } else {
            echo "<script>alert('Registration failed. Please try again.')</script>";
        }
    }
}
?>
