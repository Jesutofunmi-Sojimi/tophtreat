<?php include("app/connect.php"); ?>

<?php
	
	class DbOperation
	{
		function dbSelect($columnsName,$tablesName,$conditions)
		{
			$objConnection = new Connection();
			// object declaretion for using Connection class. Connection class is in ConnectionModel.php file
			$objConnection->dbConnection();
			$con = $objConnection->con;
			//$sql = "SELECT DISTINCT ".$columnsName." FROM ".$tablesName." WHERE ".$conditions;
			$result = mysql_query("SELECT DISTINCT ".$columnsName." FROM ".$tablesName." WHERE ".$conditions);
			//var_dump($sql);
			//var_dump($result);
			// $objConnection->dbCloseConnection();
			//var_dump($result);
			return $result;
		}

		function dbJoinSingleSelect($columnsName,$tablesName,$conditions)
		{
			$objConnection = new Connection();
			// object declaretion for using Connection class. Connection class is in ConnectionModel.php file
			$objConnection->dbConnection();
			$con = $objConnection->con;
			//$sql = "SELECT ".$columnsName." FROM ".$tablesName." ".$conditions;
			$result = mysql_query("SELECT ".$columnsName." FROM ".$tablesName." ".$conditions);
			//var_dump($sql);
			//var_dump($result);
			// $objConnection->dbCloseConnection();
			//var_dump($result);
			return $result;
		}
		
		function dbSelectAll($columnsName,$tablesName,$conditions)
		{
			$objConnection = new Connection();
			// object declaretion for using Connection class. Connection class is in ConnectionModel.php file
			$objConnection->dbConnection();
			$con = $objConnection->con;
			//$sql = "SELECT ".$columnsName." FROM ".$tablesName." WHERE ".$conditions;
			$result = mysql_query( "SELECT ".$columnsName." FROM ".$tablesName." WHERE ".$conditions);
			//var_dump($sql);
			//var_dump($result);
			// $objConnection->dbCloseConnection();
			//var_dump($result);
			return $result;
		}
		
		function getForRecomandationNumber()
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "COUNT(hodApproval)";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions =  " hodApproval = 0  AND department = '".$_SESSION['department']."'";
			// conditions, what we want to apply
			$result = $objDbOperation->dbSelectAll($columnsName,$tablesName,$conditions);
			//var_dump($result);
			return $result;
		}

		function getForDeanApproval()
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "COUNT(hodApproval)";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions = "hodApproval = 1 AND deanApproval = 0 AND faculty = '".$_SESSION['faculty']."'";
			// conditions, what we want to apply
			$result = $objDbOperation->dbSelectAll($columnsName,$tablesName,$conditions);
			//var_dump($result);
			return $result;
		}

		function getForhrApproval()
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "COUNT(deanApproval)";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions = "deanApproval = 1 AND hrApproval =0";
			// conditions, what we want to apply
			$result = $objDbOperation->dbSelectAll($columnsName,$tablesName,$conditions);
			//var_dump($result);
			return $result;
		}
		
		function getApprovalNotification()
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "COUNT(hrApproval)";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions = "hrApproval = 1 AND appliedStaffId = '".$_SESSION['staff_id']."'";
			// conditions, what we want to apply
			$result = $objDbOperation->dbSelectAll($columnsName,$tablesName,$conditions);
			//var_dump($result);
			return $result;
		}

	}
	
?>