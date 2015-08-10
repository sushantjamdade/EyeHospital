<?php
mysql_connect("localhost","root","root") or die(mysql_error());
mysql_select_db("wireframes");
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
   if (isset($_GET["USurgery"]))
  {
    $USurgery = json_decode($_GET["USurgery"]);

    $result= array($USurgery->name);
	  $product=$USurgery->name;
	  
	  $query="SELECT * FROM surgery_master WHERE Surgery_Name='$product'";
$sql=mysql_query($query);
if (mysql_num_rows($sql)>0) {
	
		$response_array = array();
		$response_array ='name already exist';
        
               echo json_encode($response_array);
	  
	  
	  
	  
  }
  
  }  
	  else
  {
    $result = "INVALID REQUEST DATA";
	echo json_encode($result);
  }

  }
  else
{
	 $result="Method is not POST";
	 echo json_encode($result);
}
?>