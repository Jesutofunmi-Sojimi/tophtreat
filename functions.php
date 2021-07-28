<?php 
session_start();

// connect to database

$db = mysqli_connect('localhost', 'root', '', 'toph_food');

//require 'config/connect.php';

// variable declaration
$fullname = "";
$email= "";
$mobile_no= "";
$address= "";
$password= "";
$confirm_password= "";

$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['reg_user'])) {
    register();

}
// REGISTER USER
function register(){
  // call these variables with the global keyword to make them available in function
  global $db, $errors, $fullname, $email, $mobile_no, $address, $password, $confirm_password;

  // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fullname  =  e($_POST['fullname']);
    $email = e($_POST['email']);
    $mobile_no  =  e($_POST['mobile_no']);
    $address  =  e($_POST['address']);
    $password  = e($_POST['password']);
    $confirm_password  = e($_POST['password']);

  // form validation: ensure that the form is correctly filled
  if (empty($fullname)) { 
    array_push($errors, "Full Name is required"); 
  }
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($mobile_no)) { 
    array_push($errors, "Mobile Number is required"); 
  }

   if (empty($address)) { 
    array_push($errors, "Address is required"); 
  }

  if (empty($password)) { 
    array_push($errors, "Password is required"); 
  }

  if ($password != $confirm_password) {
    array_push($errors, "The two passwords do not match");
  }



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE fullname='$fullname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fullname'] === $fullname) {
      array_push($errors, "Name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = ($confirm_password);//encrypt the password before saving in the database

   $query = "INSERT INTO customer(fullname, email, mobile_no, address, password, confirm_password) 
          VALUES('$fullname', '$email','$mobile_no','$address', '$password', '$confirm_password')";
      mysqli_query($db, $query);

      $_SESSION['email'] = $email;
       $_SESSION['fullname'] = $fullname;


      /*$_SESSION['success']  = "Registration Successful";*/

    echo '<script>alert("You have successfully registered")</script>';
      echo '<script>window.location="registration.php"</script>';

     


       /*header('location: registration.php');*/
     }

    else {
      echo "Registration unsuccessful";       
    }

  }





// return user array from their id
function getUserById($id){
  global $db;
  $query = "SELECT * FROM customer WHERE cus_id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

// escape string
function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
}
function isLoggedIn()
{
  if (isset($_SESSION['user'])) {
    return true;
  }else{
    return false;
  }
}


/*
// call the login() function if register_btn is clicked
if (isset($_POST['login_user'])) {
  login();
}

// LOGIN USER
function login(){
  global $db, $school_id, $password, $errors;

  // grap form values
  $school_id = e($_POST['school_id']);
  $password = e($_POST['password']);

  // make sure form is filled properly
  if (empty($school_id)) {
    array_push($errors, "School_ID is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // attempt login if no errors on form
  if (count($errors) == 0) {
    $password = md5($password);
  

    $query = "SELECT * FROM users WHERE school_id='$school_id' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
      // check if user is admin or user
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['user_type'] == 'admin') {

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: admin.php');     
      }
      elseif ($logged_in_user['user_type'] == 'user')
       {
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: new.php');
      }

   }
    else {
      array_push($errors, "Wrong username/password combination");
    }
  }

  }


/*function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
    return true;
  }else{
    return false;
  }
}*/
?>