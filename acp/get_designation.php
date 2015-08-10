<?php
 
/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();
 
mysql_connect("localhost","root","root");
mysql_select_db("wireframes");
 
// get all products from products table
$result = mysql_query("SELECT *FROM designation_master") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["design"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $design = array();
        $design["id"] = $row["desig_Id"];
        $design["name"] = $row["designation_name"];
       
       
 
        // push single product into final response array
        array_push($response["design"], $design);
    }
    
    // echoing JSON response
    echo json_encode($response["design"]);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}

?>