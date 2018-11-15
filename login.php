<?php
session_start();
require_once 'conn.php';
require_once 'functions.php';
if(isset($_SESSION['user_login'])){
	$URL = "index.php";
	redirect($URL);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Spare Parts System</title>
        <link rel="icon" href="images/trace-logo.ico">
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=2, shrink-to-fit=yes">
		<script src="js/glm-ajax.js" type="text/javascript"></script>
		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>-->
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="scripts/js/scripts.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/jquery-ui.min.css"/>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/custom-style.css" />
		<link rel="stylesheet" href="css/all.css">
	</head>
  <body>
		<header>

		</header>
    <div class="container-fluid">
      <div class="row" style="margin-top: 100px;">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
          <div id="main-login-container">
            <img src="images/spare-parts-logo-big.png" class="img-fluid" onclick="login()" alt="">
          </div>          
        </div>
        <div class="col-sm-4">

        </div>
      </div>
    </div>
  </body>
</html>
