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
$query = "SELECT * FROM specialisation_master where del_flag=?";		

$result = $dbConnection->prepare($query);
$result->execute(array($del_flag));	

while($rows = $result->fetch())
{
$data[] = array(
"id" => $rows['Id'],
"name" => $rows['Specalisation_name'],
"description" => $rows['description']

);


}



echo (json_encode($data));
return json_encode($data); 

}



?>