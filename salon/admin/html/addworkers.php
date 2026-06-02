<?php
include "header.php";
?>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">ADD WORKERS</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown">
                  <i class="material-icons">person</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
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
                  <h4 class="card-title">ADD WORKERS</h4>
                </div>
                <div class="card-body">
                  <form action="addworkers.php" method="POST" enctype="multipart/form-data">
                    <table>
                      <tr><td>Name</td><td><input type="text" name="name" required></td></tr>
                      <tr>
                        <td>Upload Image</td>
                        <td>
                          <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="loadFile(event)">
                          <img id="output" style="max-width:100px; margin-top:10px;">
                        </td>
                      </tr>
                      <tr><td>Description</td><td><textarea name="description" required></textarea></td></tr>
                      <tr><td><input type="submit" class="btn btn-primary btn-round" value="Insert Worker" name="submit"></td></tr>
                    </table>
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

<?php include "footer.php"; ?>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src);
    }
  };
</script>

<?php
if (isset($_POST["submit"])) {
    // FIXED: Sanitise inputs
    $name        = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $target_dir  = "../../uploads/";
    $filename    = basename($_FILES["fileToUpload"]["name"]);

    // FIXED: Validate file type — only images allowed
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $file_type     = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);

    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Only image files are allowed!')</script>";
    } elseif ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "<script>alert('File size must be under 2MB!')</script>";
    } else {
        $target_file = $target_dir . time() . '_' . $filename;

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            include "../../dbconnect.php";

            // FIXED: Prepared statement
            $stmt = mysqli_prepare($con, "INSERT INTO workers(w_name, description, photo) VALUES(?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $name, $description, $filename);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                echo "<script>alert('Worker added successfully!')</script>";
            } else {
                echo "<script>alert('Database error. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('File upload failed. Please try again.')</script>";
        }
    }
}
?>
