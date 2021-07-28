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
    <title>TophTreat</title>
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
            <li class="nav-item"><a href="#section-food-zone" class="nav-link">Food zone</a></li>
            <li class="nav-item"><a href="member-index.php" class="nav-link">My account</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
    </ul>
    </div> 
    </nav>

<body>
    
  

<div class="container" style="width:95%; ">

<div class="row" >  

<div class="sidenav bg-light " style="margin-top: 50px;">
  <a href="#"><?php echo$_SESSION['login_user2']; ?></a>
  <a href="memeber-index.php">Home</a>
 <a href="cart.php" class="nav-link"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a>
   
    <a href="diet.php">Track Your Diet</a>

    <a href="setting.php">Setting</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main" style="min-height: 780px;">
      <div class="col-md-12">
       
</div>
<div class="row" style="margin-top: 100px;">
 <div class="col-md-12" style="padding:0px  100px;">
        <h3 style="text-align: center;">Change Password</h3> <hr>
        <form id="updateForm" name="updateForm" method="post" action="update.php">
          <input name="opassword" type="password" class="form-control" id="opassword" placeholder="Current Password" style="width: 500px;" /> <br>
          <input name="npassword" type="password" class="form-control" id="npassword" placeholder="New Password"/> <br>
          <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="confirm New Password"/> <br>
          <input type="submit" name="Submit" value="Change" class="form-control btn btn-primary" /> <br>
        </form>
        <br>
        <?php 
          if (isset($_GET['wrongpassword'])) {
            echo '<div class="alert alert-danger">Password does not match!</div>';
          }
        ?>
        <br>
         <?php 
          if (isset($_GET['passwordchanged'])) {
            echo '<div class="alert alert-success">Password has been updated successfully!</div>';
          }
        ?>

      </div>
</div>
</div></div>
</div>
    <footer class="container-fluid bg-4 text-center">
  <br>
  <p> TophTreat 2019 | &copy All Rights Reserved </p>
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