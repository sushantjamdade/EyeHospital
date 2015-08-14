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
$index = $data->id; 

$qry = $dbConnection->prepare("SELECT * from designation_master WHERE desig_Id=?");
$qry->execute(array($index));
$data = array();
while($rows = $qry->fetch())
{
$data[] = array(
"id" => $rows['desig_Id'],
"name" => $rows['designation_name'],
"description" => $rows['description']
);
}
echo(json_encode($data));
return json_encode($data); 
}
?>