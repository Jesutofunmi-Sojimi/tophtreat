 
<?php
	

	
	//Programming Naming Convention Standard = Camel Case 
	//-----------------------------
	
	//Class Name Standard = UpperCamelCase
	//Methods/Functions Name Standard = lowerCamelCase
	//Variables Name Standard = lowerCamelCase
	//---------------------------------------------------------------
	class Connection
	{
		
		var $con;
		
		function dbConnection()
		{
			$serverName = "localhost";
			$userName = "root";
			$password = "";
			$con = mysql_connect($serverName, $userName, $password);
			
			if (!$con)
            {
                die('Could not connect: ' . mysql_error());
            }
			
			mysql_select_db( "fos");
			$this->con=$con;
		}
		
		// function dbCloseConnection()
		// {	 
		// 	mysql_close($this->con);
		// }
		
	}
	
?>

<!-- <?php
$dbname = "leavesystem";
$host = "localhost";
$user = "root";
$password = "";


$conn = mysql_connect($host, $user, $password) or die(mysql_error());
	mysql_select_db($dbname, $conn);

?> -->