<?php
 
mysql_connect("localhost","root","root") or die(mysql_error());
mysql_select_db("androidhive");
 
/** Switch Case to Get Action from controller **/
 
switch($_GET['action']) {
case 'add_product' :
add_product();
break;
 
case 'get_product' :
get_product();
break;
 
case 'edit_product' :
edit_product();
break;
 
case 'delete_product' : 
delete_product();
break;
 
case 'update_product' :
update_product();
break;
}
 
/** Function to Add Product **/
 
function add_product() {
$data = json_decode(file_get_contents("php://input")); 
$prod_name = $data->prod_name; 
$prod_desc = $data->prod_desc;
$prod_price = $data->prod_price;
$prod_quantity = $data->prod_quantity;
 
//print_r($data);
$qry = "INSERT INTO products(name,price,quantity,description) values ('$prod_name','$prod_price','$prod_quantity ','$prod_desc')";
 
$qry_res = mysql_query($qry);
if ($qry_res) {
$arr = array('msg' => "Product Added Successfully!!!", 'error' => '');
$jsn = json_encode($arr);
// print_r($jsn);
echo $jsn;
} 
else {
$arr = array('msg' => "", 'error' => 'Error In inserting record');
$jsn = json_encode($arr);
// print_r($jsn);
}
}

/** Function to Get Product **/
 
function get_product() { 
$qry = mysql_query('SELECT * from products');
$data = array();
while($rows = mysql_fetch_array($qry))
{
$data[] = array(
"id" => $rows['pid'],
"prod_name" => $rows['name'],
"prod_desc" => $rows['description'],
"prod_price" => $rows['price'],
"prod_quantity" => $rows['quantity']
);
}
echo (json_encode($data));
return json_encode($data); 
}



function update_product() {
$data = json_decode(file_get_contents("php://input")); 
$id = $data->id;
$prod_name = $data->prod_name; 
$prod_desc = $data->prod_desc;
$prod_price = $data->prod_price;
$prod_quantity = $data->prod_quantity;
// print_r($data);
 
$qry = "UPDATE product set prod_name='".$prod_name."' , prod_desc='".$prod_desc."',prod_price='.$prod_price.',prod_quantity='.$prod_quantity.' WHERE id=".$id;
 
$qry_res = mysql_query($qry);
if ($qry_res) {
$arr = array('msg' => "Product Updated Successfully!!!", 'error' => '');
$jsn = json_encode($arr);
// print_r($jsn);
} else {
$arr = array('msg' => "", 'error' => 'Error In Updating record');
$jsn = json_encode($arr);
// print_r($jsn);
}
}
?>