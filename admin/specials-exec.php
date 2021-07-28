<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);
 $fimage = $conn->real_escape_string($_FILES['photo']['name']);
 $start_date = $conn->real_escape_string($_POST['start_date']);
$end_date = $conn->real_escape_string($_POST['end_date']);


// Storing Session
$user_check=$_SESSION['login_user1'];
$fsql = "SELECT * FROM specials WHERE special_name = '$name' and special_price = '$price";
$fresult = mysqli_query($conn,$fsql);


  if(move_uploaded_file($_FILES['photo']['tmp_name'], 'img/specials/'.$fimage)){

$query = "INSERT INTO specials( special_name, special_price, special_description,special_photo, special_start_date,  special_end_date) VALUES('" . $name . "','" . $price . "','" . $description . "', '". $fimage . "', '".$start_date."', '" . $end_date . "')";
$success = $conn->query($query);

if (!$success){
echo "error";
	
}
else {
	echo "SUCCESS";
	header('Location: special_deals.php?smessage=foodadded');
}
}
else{
  echo "file is not moved";
}

$conn->close();
}


?>