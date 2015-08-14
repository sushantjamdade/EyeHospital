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

$qry = $dbConnection->prepare("SELECT * from branch_master WHERE Branch_ID=?");
$qry->execute(array($index));
$data = array();
while($rows = $qry->fetch())
{
$data[] = array(
"id" => $rows['Branch_ID'],
"name" => $rows['branch_name'],
"address" => $rows['addr'],
"city" => $rows['city'],
"State1" => $rows['state'],
"pin" => $rows['pin_code'],
"emailid" => $rows['Email_ID'],
"phno" => $rows['Phone_No']
);
}
echo(json_encode($data));
return json_encode($data); 
}
?>