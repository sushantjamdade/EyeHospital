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
$index = $data->id; 
$del_flag='0';

$qry = $dbConnection->prepare("UPDATE designation_master set del_flag=? WHERE desig_Id=?");
$qry->execute(array($del_flag,$index));
if ($qry) {
$arr = array(" data deleted Successfully!!!");
$jsn = json_encode($arr);
// print_r($jsn);
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
// print_r($jsn);
}

}
?>