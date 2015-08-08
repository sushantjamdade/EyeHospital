<?php
error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{	
	if($_SERVER["REQUEST_METHOD"]==="POST")
	{
		
		if(isset($_GET["USurgery"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$USurgery = json_decode($_GET["USurgery"]);
		$result=array("name" => $USurgery->name,
		"address" => $USurgery->address,
		"Fees" => $USurgery->fees);
		
		$name=$result['name'];
		$address=$result['address'];
		$Fees=$result['Fees'];
		
	$sql = $dbConnection->prepare("INSERT INTO surgery_master(Surgery_Name,Description,fees,del_flag,cts,username) VALUES (?,?,?,?,?,?)");	
	$sql->execute(array($name,$address,$Fees,'1',$date,$userid));	
		
		$result="success";
		echo json_encode($result);
		}
		else
		{
			$result="data not inserted";
			echo json_encode($result);
		}
		
	}
	
	else{
		$result= "Method is not Post.";
		echo json_encode($result);
		
	}
	
	
}
		?>