<!-- Display all Food from food table -->
<?php

require 'connect.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TophTreat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/icomoon.css">
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
            <li class="nav-item"><a href="Contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
    </ul>
    </div> 
    </nav>

<body style="background: #363C33; color: white;">>


<div class="container" style="width:95%; ">


 <div class="container-fluid">
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="margin-top:100px;  text-align:center; ">
      <h1>Access Denied</h1>
      <h3>  You are Logged out </h3>
       <p>You don't have access to this page. <a href="registration.php"> <b> Click Here </b> </a> to login first or register for free.
         The registration won't take long:-)</p>
      <p><a class="btn btn-primary" style="padding:10px 30px; border-radius:0px;" href="registration.php">Login or Registration</a></p>
    </div>
   </div>
 </div>

</div>
   
</body>
<!--
  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Food Exploria 2017 | &copy All Rights Reserved </p>
  <br>
  </footer>
-->
</html>