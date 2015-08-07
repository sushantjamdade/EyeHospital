<?php
//Created by: ManyaSK
//Date: 06-August-2015
error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{	
	if($_SERVER["REQUEST_METHOD"]==="POST")
	{
		if(isset($_GET["UChangePwd"]))
		{
			include "db/db_connection.php";	
			$userid = $_SESSION['apid'];
			
			//AJAX form submission
			$cpwd = json_decode($_GET["UChangePwd"]);
			$result = array("pwd" => $cpwd->current_pwd,"npwd" => $cpwd->new_pwd,"rpwd" => $cpwd->retype_pwd);
			
			$currentpwd = $result['pwd'];
			$newpwd = $result['npwd'];
			$retypepwd = $result['rpwd'];
			
			$query = $dbConnection->prepare("SELECT * FROM acp_log WHERE acp_pid=? ORDER BY acp_pid DESC");
			$query->execute(array($userid));
			$row = $query->fetch();		
			$uname = ucfirst($row['uname']);
			$to = $row['email'];
			$admin_id = $row['acp_pid'];		
			$password = $row['spwd'];		
			$csalt = $row['ssalt'];
			$currentpwd_hash = hash('sha256', $currentpwd);	
			$encrypted_password = hash('sha256', $csalt . $currentpwd_hash);
			
			if($password==$encrypted_password)
			{
				if($newpwd==$retypepwd)
				{
					$hash = hash('sha256', $newpwd);					
					$md5 = md5(uniqid(rand(), TRUE));					
					$salt = substr($md5, 0, 3);					
					$enc_pwd = hash('sha256', $salt . $hash);
					
					$stmt = $dbConnection->prepare("UPDATE acp_log SET wachtwoord=?,spwd=?,ssalt=? WHERE acp_pid=? ");
					$stmt->execute(array($newpwd,$enc_pwd,$salt,$admin_id));
					
					$subject = "[ Eye Hospital ] Admin login Password changed";

					$message = "Dear $uname,\nYou have changed password for Admin account\n\nuname:- $uname\nEmail-Id:- $to\n\n\nIf this was a mistake, just ignore this email and nothing will happen.\n\n\nBelow is the new password, Please change it after login:-\n\nNew Password:- $newpwd\n\nTo Login with your password, visit the following address:-\n\n[ # ]\n\nRegards,\nSupport Team,\nEye Hospital";
					$bcc ="bcc@dotweb.in,bcc1@dotweb.in";
					$cc ="cc@dotweb.in,cc1@dotweb.in";				
					$from1 = "EyeHospitalnhq@gmail.com";
					$from = "Eye Hospital";
					$headers .= "Reply-To: $from <$from1>\r\n";
					$headers .= "Return-Path: $from <$from1>\r\n";
					$headers .= "From: $from <$from1>\r\n";
					$headers .= "Organization: $from\r\n";
					$headers .= "Content-Type: text/plain\r\n";
					$headers .= "X-Sender: <$from1>\n";
					$headers .= "X-Mailer: PHP\n"; // mailer
					$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
					//$headers .= "Bcc:$bcc"."\n";
					//$headers .= "Cc:$cc\n";
					
					mail($to,$subject,$message,$headers);
					
					//Password changed successfully.
					$result= json_encode(array("Success"));
					echo $result;
				}
				else
				{
					$result = "Please re-type correct password.";
					echo $result;
				}
			}
			else
			{
				$result = "Invalid password.";
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
?>
