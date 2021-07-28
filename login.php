<?php session_start(); 

$db=mysqli_connect('localhost','root','', 'toph_food');
//require_once 'config/connect.php';

if(isset($_POST['login_user']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query=mysqli_query($db,"SELECT * FROM customer WHERE email='$email' AND password='$password'");
  $row=mysqli_fetch_array($query);
  

    $isexist=mysqli_query($db,"SELECT * FROM customer WHERE email='$email' AND password='$password'");
    $check_user=mysqli_num_rows($isexist);
    if($check_user==1){
       $_SESSION['id']=$row['cus_id'];
        $_SESSION['login_user2'] = $row['fullname'];

        echo '<script>alert("You have successfully logged in")</script>';
      echo '<script>window.location="member-index.php"</script>';
      /*header("location: member-index.php");*/
    }
      //elseif($email=="toph@gmail.com" && $password=="toph123"){
        
      //$query=mysqli_query($db,"INSERT INTO admin(fullname, email, mobile_no, address, password, confirm_password) 
      //VALUES('tofunmi', 'toph@gmail.com','080','lagos', 'toph123', 'toph123')") or die(mysqli_error());
      //header('location:admin.php');
      //}

    else{
      echo "Invalid Email or Password!";
    }
}
?>