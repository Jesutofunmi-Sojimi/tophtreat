<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: access-denied.php"); //Redirecting to myrestaurant Page
}
?>
<?php
if (isset($_POST['add_weight'])) {

$weight = $conn->real_escape_string($_POST['weight']);
$height = $conn->real_escape_string($_POST['height']);

$bmi = $weight/ ($height*$height);
$_SESSION['bmi']= $bmi;
}
$sql = "INSERT INTO customer_bmi (customer_id, customer_weight, customer_height, customer_bmi) VALUES('" . $_SESSION['customerid'] . "', '" . $weight. "', '" . $height . "', '" . $_SESSION['bmi'] . "')";
$success = $conn->query($sql);
if ($bmi) {
	header('Location: diet.php?message=bmi');
}

?>