<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>
    <meta charset="utf-8">
    <title>Responsive Chat Box Design | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <input type="checkbox" id="click">
    <label for="click">
      <i class="fab fa-facebook-messenger"></i>
      <i class="fas fa-times"></i>
    </label>

    <div class="wrapper">
      <div class="head-text">
Let's chat</div>
<div class="chat-box">
        <div class="desc-text">
Please leave ur message below!!!!!!</div>
<form action="#" method="POST">
          <div class="field">
            <input type="text" name="name" placeholder="Your Name" required>
          </div>
<div class="field">
            <input type="email" name="email" placeholder="Email Address" required>
          </div>
<div class="field textarea">
  <textarea name="query" cols="30" rows="10" placeholder="Explain your queries.." required></textarea>
            <!-- Due to more textarea fields I got an error so I've changed the textarea name into changeit..Change the tag name to use it -->
           
          </div>
<div class="field">
            <button onclick="myFunction()" type="submit" name="submit">send</button>
            <div id="myDIV">
We will reply for your message through email soon as possible!!!!!
</div>
          </div>
</form>
</div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<?php
if(isset($_POST["submit"]))
{

  include "../dbconnect.php";
  $name=$_POST["name"];
  $email=$_POST["email"];
  $query=$_POST["query"];
  $sql="insert into enquery(name,email,query)values('$name','$email','$query')";
  $run=mysqli_query($con,$sql);
  echo '<meta http-equiv="refresh" content="0;../pretty/index.php">';

}
?>
</body>
</html>
