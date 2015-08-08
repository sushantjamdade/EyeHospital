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
		if(isset($_GET["UBranch"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$UBranch = json_decode($_GET["UBranch"]);
			$result = array("name" => $UBranch->name,
			"address" => $UBranch->address,
			"city" => $UBranch->city,
			"State" => $UBranch->State1,
			"pincode" => $UBranch->pin,
			"emailid" => $UBranch->emailid,
			"phno" => $UBranch->phno,
			);
			
			
			
			$name=$result["name"];
			$address=$result["address"];
			$city=$result["city"];
			$State=$result["State"];
			$pincode=$result["pincode"];
			$emailid=$result["emailid"];
			$phno=$result["phno"];
			
		$sql = $dbConnection->prepare("INSERT INTO branch_master(branch_name,addr,city,state,pin_code,Email_ID,Phone_No,del_flag,cts,username) VALUES (?,?,?,?,?,?,?,?,?,?)");	
			$sql->execute(array($name,$address,$city,$State,$pincode,$emailid,$phno,'1',$date,$userid));	
			
			$result="success";
			echo json_encode($result);
		}
		else{
		
		$result="not inserted";
		echo json_encode($result);
	}
	}
	
	else{
		$result= "Method is not Post.";
		echo json_encode($result);
		
	}
}

?>