<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: access-denied.php"); //Redirecting to myrestaurant Page
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SmartEat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
<style type="text/css">
    .sidenav {
  min-height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: ;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #111;
  display: block;
}

.sidenav a:hover {
  color: #FDA403;
}

.main {
  margin-top: 23px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style> 
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TophTreat</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>      
            <li class="nav-item"><a href="foodlist.php" class="nav-link">Food zone</a></li>
            <li class="nav-item"><a href="member-index.php" class="nav-link">My account</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
    </ul>
    </div> 
    </nav>

<body>

        <div class="container" style="margin-top: 50px;">
          
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed Successfully.</h1>
        
        </div>
        <br>

<h2 class="text-center"> Thank you for shopping at SmartEat! The ordering process is now complete.</h2>

<?php 
  $num1 = rand(100000,999999); 
  $num2 = rand(100000,999999); 
  $num3 = rand(100000,999999);
  $number = $num1.$num2.$num3;
?>

<h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$number"; ?></span> </h3>


 <div class="container" >
  <h5 class="text-center">Please read the following information about your order.</h5>
  <div class="box">
    <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
      <h3 style="color: orange;">Your order has been received and placed into out order processing system.</h3>
      <br>
      <h4>Please make a note of your <strong>order number</strong> now and keep in the event you need to communicate with us about yur order.</h4>
      <br>
      <h3 style="color: orange;">Getting Your Receipt</h3>
      <br>
      <br>
      <h3 style="color: orange;">Your Shopping Cart Has Been Emptied</h3>
      <br>
      <h4>The items you purchased have been removed from your cart.</h4>

    </div>
  </div>
  </div>

        


<br><br>
        </body>

     <footer class="container-fluid bg-4 text-center">
  <br>
  <p> TophTreat| &copy All Rights Reserved </p>
  <br>
  </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>

    <script src="js/main.js"></script>
</body>
</html>