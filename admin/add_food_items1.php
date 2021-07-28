<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);
 $fimage = $conn->real_escape_string($_FILES['fimage']['name']);
  $categories = $conn->real_escape_string($_POST['categories']);


// Storing Session
$user_check=$_SESSION['login_user1'];
$fsql = "SELECT * FROM food WHERE name = '$name'";
$fresult = mysqli_query($conn,$fsql);
if (mysqli_num_rows($fresult)==1) {
             //echo '<div class="alert alert-danger">the food item has been added before</div>';
    header('Location: food_item.php?fmessage=foodnotadded'); 
                            }
            else{


  if(move_uploaded_file($_FILES['fimage']['tmp_name'], 'img/'.$fimage)){

$query = "INSERT INTO food(name,price,description,image,categories) VALUES('" . $name . "','" . $price . "','" . $description . "', '". $fimage . "', '".$categories."')";
$success = $conn->query($query);

if (!$success){
echo "error";
	
}
else {

	header('Location: food_item.php?smessage=foodadded');
}
}
else{
  echo "file is not moved";
}

$conn->close();
}
}

?>