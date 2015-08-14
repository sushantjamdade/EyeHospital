<?php


 /** Switch Case to Get Action from controller **/
 
switch($_GET['action']) {
case 'add_surgery' :
add_surgery();
break;
 
case 'get_surgery' :
get_surgery();
break;
 
case 'edit_surgery' :
edit_surgery();
break;
 
case 'delete_surgery' : 
delete_surgery();
break;
 
case 'update_surgery' :
update_surgery();
break;
}
 
/** Function to Add Product **/
 
function add_surgery() {
$data = json_decode(file_get_contents("php://input")); 

 include "db/db_connection.php";	

$name = $data->name; 
$address = $data->address;
$fees = $data->fees;
 $date = date('Y-m-d');
//$userid = $_SESSION['apid'];

$sql=$dbConnection->prepare("INSERT INTO surgery_master(Surgery_Name,Description,fees,del_flag,cts) VALUES (?,?,?,?,?)");	
$qry_res=$sql->execute(array($name,$address,$fees,'1',$date));

if ($qry_res) {
$arr = array("Surgery Added Successfully!!!");
$jsn = json_encode($arr);

echo $jsn;
} 
else {
$arr = array('msg' => "not inserted", 'error' => 'Error In inserting record');
$jsn = json_encode($arr);

}
}

/** Function to Get Product **/
 
function get_surgery() { 
include "db/db_connection.php";	
$del_flag='1';
$query = "SELECT * FROM surgery_master where del_flag=?";		

$result = $dbConnection->prepare($query);
$result->execute(array($del_flag));	


$data = array();

while($rows = $result->fetch())
{
$data[] = array(
"id" => $rows['ID'],
"Surgery_Name" => $rows['Surgery_Name'],
"Description" => $rows['Description'],
"fees" => $rows['fees'],
);
}

echo (json_encode($data));
return json_encode($data);
}

/** Function to Edit Product **/
 
function edit_surgery() {
include "db/db_connection.php";		
$data = json_decode(file_get_contents("php://input")); 
$index = $data->id; 
//$qry = mysql_query("SELECT * from surgery_master WHERE ID='$index'");
$qry = $dbConnection->prepare("SELECT * from surgery_master WHERE ID=?");
$qry->execute(array($index));
$data = array();
while($rows = $qry->fetch())
{
$data[] = array(
"id" => $rows['ID'],
"name" => $rows['Surgery_Name'],
"address" => $rows['Description'],
"fees" => $rows['fees']

);
}
echo(json_encode($data));
return json_encode($data); 
}
 

function update_surgery() {
include "db/db_connection.php";	
$data = json_decode(file_get_contents("php://input")); 
$id = $data->id;
$name = $data->name; 
$address = $data->address;
$fees = $data->fees;

// print_r($data);
 
//$qry = "UPDATE surgery_master set Surgery_Name='$name' , Description='$address',fees='$fees' WHERE ID='$id'";
 
//$qry_res = mysql_query($qry);

$qry_res = $dbConnection->prepare("UPDATE surgery_master set Surgery_Name=?,Description=?,fees=? WHERE ID=?");
	$qry_res->execute(array($name,$address,$fees,$id));
if ($qry_res) {
$arr = array("Surgery Data Updated Successfully!!!");
$jsn = json_encode($arr);
// print_r($jsn);
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
// print_r($jsn);
}
}




function delete_surgery() {
	
$data = json_decode(file_get_contents("php://input")); 
include "db/db_connection.php";	
$index = $data->id; 
$del_flag='0';

$qry = $dbConnection->prepare("UPDATE surgery_master set del_flag=? WHERE ID=?");
$qry->execute(array($del_flag,$index));
if ($qry) {
$arr = array("surgery data deleted Successfully!!!");
$jsn = json_encode($arr);
// print_r($jsn);
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
// print_r($jsn);
}

}


?>