
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



<body style="background: #363C33; color: white; margin-top: 80px;">

<?php

require 'connect.php';
$conn = Connect();

$fullname = $conn->real_escape_string($_POST['fullname']);
$username = $conn->real_escape_string($_POST['username']);
$contact = $conn->real_escape_string($_POST['contact']);
$address = $conn->real_escape_string($_POST['address']);
$password = $conn->real_escape_string($_POST['password']);

$rsql = "SELECT * FROM customer WHERE username = '$username'";
$rresult = mysqli_query($conn, $rsql);
if (mysqli_num_rows($rresult)==1) {
   header('Location: registration.php'); 
 }

  else{

$query = "INSERT into CUSTOMER(fullname,username,contact,address,password) VALUES('" . $fullname . "','" . $username . "','" . $contact . "','" . $address ."','" . $password ."')";
$success = $conn->query($query);

if (!$success){
  die("Couldnt enter data: ".$conn->error);
}

$conn->close();

?>
   
<?php if($success){

  ?>
<div class="container" style="width:95%; ">


 <div class="container-fluid">
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="margin-top:100px;  text-align:center; ">
      <h1><?php echo "Welcome $fullname!" ?> </h1>
      <h3>  Your account has been created.</h3>
       <p>Login Now from <a href="registration.php">HERE</a></p>
    </div>
   </div>
 </div>

</div>


<?php } }?>
    </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p></p>
  <br>
  </footer>
</html>