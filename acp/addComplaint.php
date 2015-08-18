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
$date = date('Y-m-d');
$userid = $_SESSION['apid'];
			
$data = json_decode(file_get_contents("php://input")); 

$complaint = $data->complaint; 
$description = $data->description;

$qry_res = $dbConnection->prepare("INSERT INTO complaint_master(complaint,description,del_flag,Cts,user_name) VALUES (?,?,?,?,?)");
$qry_res->execute(array($complaint,$description,'1',$date,$userid));

if ($qry_res)
{
$arr = array("Complaint Added Successfully!!!");
$jsn = json_encode($arr);
echo $jsn;
}
else {
$arr = array('msg' => "Not Added ", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
echo $jsn;
}


/*$result = array("complaint" => $data->complaint,"description" => $data->description);
$jsn = json_encode($result);
echo $jsn;
*/
}
?>