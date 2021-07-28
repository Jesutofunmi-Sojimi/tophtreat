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
  <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
    <link rel="stylesheet" href="css/icomoon.css">
</head>
<style type="text/css">
  .sidenav {
  height: 100%;
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
.mypanel{
  
  float: left;
margin-top: 0px;
  margin-bottom: 20px;
  margin-left: 20px;
  margin-right: 20px;
  padding: 0px;
  text-align: center;
   height: 550px;
}
</style> 

    
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
             <li class="nav-item"><a href="cart.php" class="nav-link"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
    </ul>
    </div> 
    </nav>



<body style="margin-top: 30px;">
<div class="row">
  <div class="col-md-2" style="padding-left: 50px;">Menu Bar
    <form method="post">
    <select class="form-control" name="cat_list" style="height: 50px;">
      <?php 
        $catsql = "SELECT * FROM categories";
        $catresult = mysqli_query($conn, $catsql);
        while ($catfetch = mysqli_fetch_assoc($catresult)) {
          extract($catfetch);
          echo '<option value="'.$category_id.'">'.$category_name.'</option>';
        }
    ?>
    </select><br>
    <button class="btn-primary" name="showcat">Show Food</button>
    </form>
     <?php
if (isset($_POST['showcat'])) {
  extract($_POST);
header('Location: food_cat.php?catid='.$cat_list);
}
    ?>
  </div>
  <div class="col-md-9"> 
    <?php
extract($_GET);

$sql = "SELECT * FROM food WHERE categories='$category_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_assoc($result)){
echo
'

<form method="post" action="cart.php?action=add&id='.$row["food_id"].'">
<div class="mypanel col-md-3" >
<img style=" display: block; margin: auto; height: 250px; width: 100%;" src=admin/img/'.$row["image"].' class="img-responsive">
<h5 class="text-info">'.$row['name'].'</h5>
<p class="text-info">'.$row['description'].'</p>
<h5 class="text-danger">&#8358; '.$row['price'].' </h5>
<center><h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5></center>
<input type="hidden" name="hidden_name" value='.$row["name"].'>
<input type="hidden" name="hidden_price" value='.$row["price"].'>
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>';
?>

<?php
}
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>
       
    </div>
  </div>

  <?php

}

?>
  </div>

</div>
   
</body>

</html>