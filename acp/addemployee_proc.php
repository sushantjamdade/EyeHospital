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
		if(isset($_GET["UEmployee"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$UEmployee = json_decode($_GET["UEmployee"]);
			$result = array("name" => $UEmployee->name,
			"dob" => $UEmployee->dob,
			"bgroup" => $UEmployee->bgroup,
			"doj" => $UEmployee->doj,
			"address" => $UEmployee->address,
			"city" => $UEmployee->city,
			"State" => $UEmployee->State1,
			"pincode" => $UEmployee->pin,
			"emailid" => $UEmployee->emailid,
			"selectedDesignation"=> $UEmployee->selectedDesignation,
			"selectedSpecial"=> $UEmployee->selectedSpecial,
			"phno" => $UEmployee->phno,
			"Qualification" => $UEmployee->Qualification
			);
			
			
			
			$name=$result["name"];
			$address=$result["address"];
			$city=$result["city"];
			$State=$result["State"];
			$pincode=$result["pincode"];
			$emailid=$result["emailid"];
			$phno=$result["phno"];
	/*
		$sql = $dbConnection->prepare("INSERT INTO employee_master(emp_name,dob,blood_group,doj,add,city,state,pin,ph_no,email_id,designation,qualification,specialisation,del_flag,cts,username) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
			$sql->execute(array($name,$address,$city,$State,$pincode,$emailid,$phno,'1',$date,$userid));	
			
			$result="success";
			*/
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