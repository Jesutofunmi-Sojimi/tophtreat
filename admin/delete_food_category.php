<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{
	extract($_GET);

$sql = "DELETE FROM categories WHERE category_id = '$id'";
$result = mysqli_query($conn,$sql) or die(mysqli_error());

header('Location: categories.php');
$conn->close();
}
?>