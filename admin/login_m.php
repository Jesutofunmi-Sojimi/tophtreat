<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $email and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connect.php';
$conn = Connect();

$usersql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
            $userresult = $conn->query($usersql);

            if ($userresult->num_rows ==1) {
                // output data of each row
                $user = $userresult->fetch_assoc();

                    $_SESSION['level'] = $user['level'];
                    $_SESSION['login_user1'] = $user['fullname'];
                    

                    header("location: home.php"); // Redirecting To Other Page
            } else {

            
                 
                header("location:login-failed.php");
            }


mysqli_close($conn); // Closing Connection
}
}


?>








<!-- <?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, password FROM staff WHERE email=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch())  //fetching the contents of the row
{
	extract($stmt);
	$_SESSION['login_user1']=$username; // Initializing Session
	$_SESSION['username']=$fullname;
	header("location: home.php"); // Redirecting To Other Page
} else {
header("location: login-failed.php");
}
mysqli_close($conn); // Closing Connection
}
}
?>  -->