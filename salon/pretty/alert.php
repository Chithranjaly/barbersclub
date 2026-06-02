<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
body{ text-align:center; font-family: 'Lato', 'Helvetica Neue', Helvetica, sans-serif; background:#F9F9F9}
.checkmark-circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 156px;
  height: 156px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #000;
  stroke-miterlimit: 10;
  margin: 10% auto;
  margin-bottom:6%;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark-check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 10px #7ac142;
  }
}
</style>
</head>

<body>
<svg class="checkmark" viewBox="0 0 52 52">
	<circle class="checkmark-circle" fill="none" cx="26" cy="26" r="25" />
	<path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
</svg>




<!------------------------------------Sweet Alert Starts Here----------------------------------------------->
							<!-------No Css needed for sweet alert------->
<h2><font color="green" size="6" face="Lucida Calligraphy">Successfully booked!!!!</font></h2>                            
<a href="index.php"><button style="background:#3485C8; color:#fff; height:40px; width:200px; border:none" class="alert">close</button></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!------------------------------------Sweet Alert Ends Here----------------------------------------------->
</body>
</html>
