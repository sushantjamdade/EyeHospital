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
		
		if(isset($_GET["UDesign"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$UDesign = json_decode($_GET["UDesign"]);
		$result=array("name" => $UDesign->name,
		"address" => $UDesign->address,);
		
		$name=$result['name'];
		$address=$result['address'];
	$sql = $dbConnection->prepare("INSERT INTO designation_master(designation_name,description,del_flag,cts,username) VALUES (?,?,?,?,?)");	
	$sql->execute(array($name,$address,'1',$date,$userid));	
		
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