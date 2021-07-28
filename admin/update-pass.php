<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

extract($_GET);

$opassword = $conn->real_escape_string($_POST['opassword']);
$npassword = $conn->real_escape_string($_POST['npassword']);
$cpassword = $conn->real_escape_string($_POST['cpassword']);

if ($npassword==$cpassword) {


$sql ="UPDATE admin SET password='$npassword' WHERE email = '".$_SESSION['login_user1']."' ";
$query=mysqli_query($conn,$sql);
if ($query) {
	header('Location: setting.php?passwordchanged=password updated!');
}}else{
	header('Location: setting.php?wrongpassword=password does not match');
	
}


$conn->close();
}


?>