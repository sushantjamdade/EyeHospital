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
$query = "SELECT * FROM hospital_master where del_flag=?";		

$result = $dbConnection->prepare($query);
$result->execute(array($del_flag));	

 
//$qry = mysql_query('SELECT * from hospital_master');
//$data = array();
while($rows = $result->fetch())
{
$data[] = array(
"id" => $rows['hospital_Id'],
"hospital_name" => $rows['hospital_name'],
"Address" => $rows['Address'],
"City" => $rows['City'],
"State" => $rows['State'],
"pin_code" => $rows['pin_code'],
"email_id" => $rows['email_id'],
"phone_no" => $rows['phone_no'],
"user_name" => $rows['user_name']
);


}



echo (json_encode($data));
return json_encode($data); 

}



?>