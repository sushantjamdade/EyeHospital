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
$del_flag='1';
$query = "SELECT * FROM branch_master where del_flag=?";		

$result = $dbConnection->prepare($query);
$result->execute(array($del_flag));	

while($rows = $result->fetch())
{
$data[] = array(
"id" => $rows['Branch_ID'],
"branch_name" => $rows['branch_name'],
"Address" => $rows['addr'],
"City" => $rows['city'],
"State" => $rows['state'],
"pin_code" => $rows['pin_code'],
"email_id" => $rows['Email_ID'],
"phone_no" => $rows['Phone_No'],
"user_name" => $rows['username']
);


}



echo (json_encode($data));
return json_encode($data); 

}



?>