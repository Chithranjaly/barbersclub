<?php
include "header.php";
?>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">CHANGE PASSWORD</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown">
                  <i class="material-icons">person</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="changepassword.php">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../login.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Change Password</h4>
                  <p class="card-category">Set a new admin password</p>
                </div>
                <div class="card-body">
                  <form action="changepassword.php" method="POST">
                    <div class="form-group">
                      <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-round" name="submit" value="Change Password">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/barber.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-category text-blue">The Barber Club</h4>
                  <h6 class="card-title">The complete men's salon</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
if (isset($_POST["submit"])) {
    $current_password = $_POST["current_password"];
    $new_password     = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('New passwords do not match!')</script>";
    } else {
        include "../../dbconnect.php";

        // FIXED: Fetch current hashed password with prepared statement
        $stmt = mysqli_prepare($con, "SELECT user_id, password FROM tbl_login WHERE usertype = 'admin' LIMIT 1");
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row    = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        // FIXED: Verify current password before allowing change
        if ($row && password_verify($current_password, $row["password"])) {
            $hashed_new = password_hash($new_password, PASSWORD_DEFAULT);
            $admin_id   = $row["user_id"];

            // FIXED: Update with prepared statement
            $stmt = mysqli_prepare($con, "UPDATE tbl_login SET password = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($stmt, "si", $hashed_new, $admin_id);
            $run = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($run) {
                echo "<script>alert('Password Changed Successfully')</script>";
            } else {
                echo "<script>alert('Password Change Failed')</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect!')</script>";
        }
    }
}
?>

<?php include "footer.php"; ?>
