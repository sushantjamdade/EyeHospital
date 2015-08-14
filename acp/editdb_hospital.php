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

$qry = $dbConnection->prepare("SELECT * from hospital_master WHERE hospital_Id=?");
$qry->execute(array($index));
$data = array();
while($rows = $qry->fetch())
{
$data[] = array(
"id" => $rows['hospital_Id'],
"hname" => $rows['hospital_name'],
"address" => $rows['Address'],
"city" => $rows['City'],
"State1" => $rows['State'],
"pin" => $rows['pin_code'],
"emailid" => $rows['email_id'],
"phno" => $rows['phone_no']
);
}
echo(json_encode($data));
return json_encode($data); 
}
?>