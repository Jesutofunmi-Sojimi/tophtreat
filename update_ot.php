<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

$address = $conn->real_escape_string($_POST['address']);

$query = "INSERT INTO delivery_address (customer_id, address) VALUES('".$_SESSION['cus_id']."','" . $address . "')";
$success = $conn->query($query);
}

$_SESSION['delivery_address']=$address;
if (!$success){
echo "error";
  
}
else {
  echo "SUCCESS";
  header('Location: payment.php');
}
$conn->close();



?>