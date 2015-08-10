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
		if(isset($_GET["UHospital"]))
		{
			include "db/db_connection.php";	
			
		    $date = date('Y-m-d');
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$UHospital = json_decode($_GET["UHospital"]);
			$result = array("name" => $UHospital->hname,
			"address" => $UHospital->address,
			"city" => $UHospital->city,
			"State" => $UHospital->State1,
			"pincode" => $UHospital->pin,
			"emailid" => $UHospital->emailid,
			"phno" => $UHospital->phno,
			);
			
			
			
			$name=$result["name"];
			$address=$result["address"];
			$city=$result["city"];
			$State=$result["State"];
			$pincode=$result["pincode"];
			$emailid=$result["emailid"];
			$phno=$result["phno"];
			
		$sql = $dbConnection->prepare("INSERT INTO hospital_master(hospital_name,Address,City,State,pin_code,email_id,phone_no,del_flag,Cts,user_name) VALUES (?,?,?,?,?,?,?,?,?,?)");	
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