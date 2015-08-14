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
$address = $data->address;
$city = $data->city;
$State1 = $data->State1;
$city = $data->city;
$pin = $data->pin;
$emailid = $data->emailid;
$phno = $data->phno;
$qry_res = $dbConnection->prepare("INSERT INTO branch_master(branch_name,addr,city,state,pin_code,Email_ID,Phone_No,del_flag,cts,username) VALUES (?,?,?,?,?,?,?,?,?,?)");
$qry_res->execute(array($name,$address,$city,$State1,$pin,$emailid,$phno,'1',$date,$userid));
if ($qry_res) {
$arr = array(" Data Added Successfully!!!");
$jsn = json_encode($arr);
echo $jsn;
} else {
$arr = array('msg' => "Not Added ", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
echo $jsn;
}
}
?>