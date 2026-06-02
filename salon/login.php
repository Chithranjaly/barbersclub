  <?php
session_start();
include "header.php";
?>

 <!-- ================ start banner area ================= -->
	<section class="banner-area contact" id="contact">
		<div class="container h-100">
			<div class="banner-area__content text-center">
        <h1>LOGIN</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
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
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="login.php" class="form-contact contact_form" method="post" id="contactForm">
            <h4>Login with your Email and password</h4>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email id">
                </div>
                <div class="form-group">
                  <input class="form-control" name="password" id="password" type="password" placeholder="Enter your Password">
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-left mt-3">
              <button name="submit" type="submit" class="button">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<?php
include "footer.php";
?>

<?php
if (isset($_POST["submit"])) {
    $email    = trim($_POST["email"]);
    $password = $_POST["password"];

    include "dbconnect.php";

    // FIXED: Use prepared statement — no SQL injection possible
    $stmt = mysqli_prepare($con, "SELECT user_id, password, usertype FROM tbl_login WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row    = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    // FIXED: Use password_verify() instead of plain text comparison
    if ($row && password_verify($password, $row["password"])) {
        $_SESSION["userid"] = $row["user_id"];
        $usertype = $row["usertype"];

        if ($usertype == "user") {
            header("location: pretty/index.php");
            exit();
        }
        if ($usertype == "admin") {
            header("location: admin/html/adminhomepage.php");
            exit();
        }
    } else {
        echo "<script>alert('Login Failed: Invalid email or password.')</script>";
    }
}
?>
