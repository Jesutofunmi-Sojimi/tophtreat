<!-- <?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?> -->

<?php
        session_start();
        $_SESSION = array();
         if(isset($_COOKIE[session_name()])){
            setcookie(session_name(), '', time()-42000, '/');
         }

          session_destroy();
        header('location:index.php');
?>