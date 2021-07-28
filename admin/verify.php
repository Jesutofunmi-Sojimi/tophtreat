<?php
session_start();
require 'connect.php';
$conn = Connect();
extract($_GET);

$sql ="UPDATE orders SET notification='0', order_status='0' WHERE order_ID = '$orid'";
$query=mysqli_query($conn,$sql);
if ($query) {
	header('Location: view_order_detail.php');
}
?>