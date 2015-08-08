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
		
		if(isset($_GET["USpecialization"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$USpecialization = json_decode($_GET["USpecialization"]);
		$result=array("name" => $USpecialization->name,
		"address" => $USpecialization->address,);
		
		$name=$result['name'];
		$address=$result['address'];
	$sql = $dbConnection->prepare("INSERT INTO specialisation_master(Specalisation_name,description,del_flag,cts,username) VALUES (?,?,?,?,?)");	
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