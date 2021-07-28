<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header('Location: index.php'); // Redirecting To Home Page
}

else{

$name = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$address = $conn->real_escape_string($_POST['address']);
$contact = $conn->real_escape_string($_POST['mobile_no']);
//$level = $conn->real_escape_string($_POST['level']);
$password = $conn->real_escape_string($_POST['password']);


// Storing Session
$user_check=$_SESSION['login_user1'];
$fsql = "SELECT * FROM staff WHERE fullname = '$fullname'";
$fresult = mysqli_query($conn,$fsql);
if (mysqli_num_rows($fresult)==1) {
             //echo '<div class="alert alert-danger">the food item has been added before</div>';
    header('Location: add_new_staff.php?fmessage=adminnotadded'); 
                            }
            else{

$query = "INSERT INTO admin(fullname,email,mobile_no,address,password) VALUES('" . $fullname . "','" . $email . "', '". $mobile_no . "','" . $address . "',  '".$password."')";
$success = $conn->query($query);

if (!$success){
echo "error";
	
}
else {

	header('Location: add_new_staff.php?smessage=adminadded');
}


$conn->close();
}
}

?>