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

$hname = $data->hname; 
$address = $data->address;
$city = $data->city;
$State1 = $data->State1;
$city = $data->city;
$pin = $data->pin;
$emailid = $data->emailid;
$phno = $data->phno;
$qry_res = $dbConnection->prepare("INSERT INTO hospital_master(hospital_name,Address,City,State,pin_code,email_id,phone_no,del_flag,Cts,user_name) VALUES (?,?,?,?,?,?,?,?,?,?)");
$qry_res->execute(array($hname,$address,$city,$State1,$pin,$emailid,$phno,'1',$date,$userid));
if ($qry_res) {
$arr = array("hospital Data Added Successfully!!!");
$jsn = json_encode($arr);
echo $jsn;
} else {
$arr = array('msg' => "Not Added ", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
echo $jsn;
}
}
?>