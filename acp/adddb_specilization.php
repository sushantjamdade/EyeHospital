<?php
error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{	

$data = json_decode(file_get_contents("php://input")); 

 include "db/db_connection.php";	

$name = $data->name; 
$address = $data->address;

 $date = date('Y-m-d');
$userid = $_SESSION['apid'];

$sql=$dbConnection->prepare("INSERT INTO specialisation_master(Specalisation_name,description,del_flag,cts,username) VALUES (?,?,?,?,?)");	
$qry_res=$sql->execute(array($name,$address,'1',$date,$userid));

if ($qry_res) {
$arr = array("Record Added Successfully!!!");
$jsn = json_encode($arr);

echo $jsn;
} 
else {
$arr = array('msg' => "not inserted", 'error' => 'Error In inserting record');
$jsn = json_encode($arr);

}
}