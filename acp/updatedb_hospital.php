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
$data = json_decode(file_get_contents("php://input")); 
$id = $data->id;
$hname = $data->hname; 
$address = $data->address;
$city = $data->city;
$State1 = $data->State1;
$city = $data->city;
$pin = $data->pin;
$emailid = $data->emailid;
$phno = $data->phno;

$qry_res = $dbConnection->prepare("UPDATE hospital_master set hospital_name=?,Address=?,City=?,State=?,pin_code=?,email_id=?,phone_no=? WHERE hospital_Id=?");
	$qry_res->execute(array($hname,$address,$city,$State1,$city,$pin,$emailid,$phno,$id));
if ($qry_res) {
$arr = array("hospital Data Updated Successfully!!!");
$jsn = json_encode($arr);
// print_r($jsn);
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
// print_r($jsn);
}
}
?>