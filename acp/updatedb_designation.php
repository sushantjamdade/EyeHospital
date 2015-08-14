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

$qry_res = $dbConnection->prepare("UPDATE designation_master set designation_name=?,description=? WHERE desig_Id=?");
	$qry_res->execute(array($name,$address,$id));
if ($qry_res) {
$arr = array("record Updated Successfully!!!");
$jsn = json_encode($arr);
 echo $jsn;
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
echo $jsn;
}
}
?>