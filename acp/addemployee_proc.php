<?php

error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{	
	
include "db/db_connection.php";	
$date = date('Y-m-d');
$userid = $_SESSION['apid'];
			
$data = json_decode(file_get_contents("php://input")); 

$name = $data->name; 
$dob = $data->dob;
$bgroup = $data->bgroup;
$doj = $data->doj;
$address = $data->address;
$State1 = $data->State1;
$city = $data->city;
$pin = $data->pin;
$emailid = $data->emailid;
$phno = $data->phno;
$selectedDesignation = $data->selectedDesignation;
$Qualification = $data->Qualification;
$selectedSpecial = $data->selectedSpecial;

	
	
$qry_res = $dbConnection->prepare("INSERT INTO employee_master(emp_name,blood_group,add,city,state,pin,ph_no,email_id,designation,qualification,specialisation,del_flag,cts,username) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
$qry_res->execute(array($name,$bgroup,$address,$city,$State1,$pin,$phno,$emailid ,$selectedDesignation,$Qualification,$selectedSpecial,'1',$date,$userid));	
			
if ($qry_res) {
$arr = array("Data Added Successfully!!!");
$jsn = json_encode($arr);
echo $jsn;
} else {
$arr = array('msg' => "Not Added ", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
echo $jsn;
}
}

?>