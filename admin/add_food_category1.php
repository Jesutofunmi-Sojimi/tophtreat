<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

$cname = $conn->real_escape_string($_POST['cname']);



// Storing Session
$user_check=$_SESSION['login_user1'];
$fsql = "SELECT * FROM categories WHERE category_name = '$cname'";
$fresult = mysqli_query($conn,$fsql);
if (mysqli_num_rows($fresult)==1) {
             //echo '<div class="alert alert-danger">the food item has been added before</div>';
    header('Location: categories.php?fmessage=foodadded'); 
                            }
            else{



$query = "INSERT INTO categories (category_name) VALUES('" . $cname . "')";
$success = $conn->query($query);
}
if (!$success){
echo "error";
	
}
else {
	echo "SUCCESS";
	header('Location: categories.php?smessage=foodnotadded');
}
$conn->close();
}


?>