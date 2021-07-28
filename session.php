<?php
	
	session_start();

	function logged_in(){
		return isset($_SESSION['login_user2']);
	}
	
	function confirm_logged_in(){
		if (!logged_in()) {

			header("location:access-denied.php");
		}
	}

?>