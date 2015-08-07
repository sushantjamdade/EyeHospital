<?php
error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
	include "db/db_connection.php";
	if($_SERVER["REQUEST_METHOD"]==="POST")
	{
		if(isset($_GET["ULogin"]))
		{
			//AJAX form submission
			$user = json_decode($_GET["ULogin"]);
			$result = array("receivedusername" => $user->username,"receivedpassword" => $user->password);
			
			$username = $result['receivedusername'];
			$password = $result['receivedpassword'];
			
			$status = "Active";
			$type = "Admin";		
			$sql = $dbConnection->prepare("SELECT * FROM acp_log WHERE uname=? AND status=? AND type=?");
			$sql->execute(array($username,$status,$type));
			$row = $sql->fetch();
				  
			$uid = $row['acp_pid'];
			$uname = $row['uname']; 
			$pass = $row['spwd'];	
			$salt = $row['ssalt']; 
			$emailid = $row['email'];

			$hash = hash('sha256', $password);
			$salted_hash = hash('sha256', $salt . $hash);
			
			if($uname==$username)
			{
				if($pass == $salted_hash)
				{
					$_SESSION['apid'] = $uid;
					$_SESSION['uname'] = $uname;
					
					$result= json_encode(array("Success"));
					echo $result;
				}
				else
				{
					$result = "Invalid Password.";
					echo $result;
				}
			}
			else
			{
				$result = "Invalid Username.";
				echo $result;
			}
		}
		else
		{
			$result = "Invalid Request Data.";
			echo $result;
		}
	}
	else
	{
		$result= "Method is not Post.";
		echo $result;
	}
}
else
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
?>