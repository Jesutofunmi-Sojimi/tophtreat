<?php


session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{
	$start_date =$_POST['start_date'];
	$end_date=$_POST['end_date'];

$sql="SELECT * FROM orders WHERE order_date BETWEEN '$start_date' AND '$end_date'";
$result = mysqli_query($conn, $sql);
if ($result) {
	header('Location: sales_report.php');
}else{
	echo "error";
}
}
?>