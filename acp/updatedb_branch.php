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
$name = $data->name; 
$address = $data->address;
$city = $data->city;
$State1 = $data->State1;
$city = $data->city;
$pin = $data->pin;
$emailid = $data->emailid;
$phno = $data->phno;

$qry_res = $dbConnection->prepare("UPDATE branch_master set branch_name=?,addr=?,city=?,state=?,pin_code=?,Email_ID=?,Phone_No=? WHERE Branch_ID=?");
	$qry_res->execute(array($name,$address,$city,$State1,$city,$pin,$emailid,$phno,$id));
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