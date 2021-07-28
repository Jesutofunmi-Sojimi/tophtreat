<?php include('functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
   
   

</head>
<body>


 <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
    
 <div class="navbar-brand"><a href="index.php">
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TophTreat</h1></a>
</div>
 
  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>-->

  <div class="navbar-collapse collapse" id="navbarNav">
    <!--<ul class="nav navbar-nav ml-auto">-->

      <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"><a href="index.php" class="nav-link">Back</a></li>      
            
    </ul>
    </div> 
    </nav>


        <div class="container" id="container">
    
      

<!--sign up-->
<div class="form-container sign-up-container">
    <form method="post" action="registration.php">
        <h3>Create Account</h3>
        <!--<div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>-->
        <input type="text" placeholder="Full Name" name="fullname" value="<?php echo $fullname; ?>" />
        <input type="email" placeholder="Email"  name="email" value="<?php echo $email; ?>"/>
         <input type="number" placeholder="Mobile Number" name="mobile_no" value="<?php echo $mobile_no; ?>" />
          <input type="text" placeholder="Address"  name="address" value="<?php echo $address; ?>"/>
        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>"/>
        <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo $confirm_password; ?>"/>

        <button type="submit" name="reg_user">Sign Up</button>
        
    </form>
</div>

<!--sign in-->
<div class="form-container sign-in-container">
    <form method="post" action="login.php">
        <h3>Sign in</h3>
        
        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <a href="#">Forgot your password?</a>
        <button type="submit" name="login_user">Sign In</button>
    </form>
</div>
<!--Overlay container-->
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h3>Welcome Back!</h3>
            <p>
                To get our Latest Menu login with your info 
            </p>
            <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and navigate through</p>
            <button class="ghost" id="signUp">Sign Up</button>
        </div>
    </div>
</div>

</div>

<footer class="main-footer" >
        <br><center>
      <p style="color: white;"> TophTreat 2019 | &copy; All Rights Reserved </p>
      <br></center>
          </footer>



<style type="text/css">
    body{
        background-image: url('images/about-image.jpg');
    }

h1 {
    font-weight: bold;
    margin: 0;
}

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
}

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

button {
    border-radius: 20px;
    border: 1px solid #ff4b2b;
    background-color: #ff4b2b;
    color: #ffffff;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}

button.ghost {
    background-color: transparent;
    border-color: #ffffff;
}

form {
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
}

input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.social-container {
    margin: 20px 0;
}

.social-container a {
    border: 1px solid #dddddd;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
}

.container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
    margin:auto;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

.sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.right-panel-active .sign-in-container {
    transform: translateX(100%);
}

.container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

@keyframes show {
    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
}

.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}

.overlay {
    background: #ff416c;
    background: -webkit-linear-gradient(to right, #ff4b2b, #ff416c);
    background: linear-gradient(to right, #ff4b2b, #ff416c);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #ffffff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay-left {
    transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
    transform: translateX(0);
}

.overlay-right {
    right: 0;
    transform: translateX(0);
}

.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}

footer.main-footer {
  position: absolute;
  width: 100%;
  bottom: 0;
  background: #222;
  padding: 10px 0;
}

footer.main-footer p {
  font-size: 0.7em;
  color: #777;
  margin: 0;
}

/* MAIN FOOTER MEDIAQUERIES ------------------------- */
@media (max-width: 575px) {
  footer.main-footer div[class*="col-"] {
    text-align: center !important;
  }
}

@media (min-width: 768px) {
  footer.main-footer p {
    font-size: 0.9em;
  }
}
</style>


<script type="text/javascript">

    /*Javascript*/
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});
    </script>


    </body>
</html>