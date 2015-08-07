<?php
error_reporting(0);
session_start();
if($_SESSION['apid']=="")
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Login</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		
		<!-- Custom styling plus plugins -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/icheck/flat/green.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
		
		<!--[if lt IE 9]>
		<script src="../assets/js/ie8-responsive-file-warning.js"></script>
		<![endif]-->
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/script.js"></script>
	</head>
	<body style="background:#F7F7F7;" ng-app="LoginModule">
		<div class="" ng-controller="LoginController">
			<a class="hiddenanchor" id="toregister"></a>
			<a class="hiddenanchor" id="tologin"></a>
			<div id="wrapper">
				<div id="login" class="animate form">
					<section class="login_content">
						<strong class="error">{{getCallJSONResult}}</strong>
						<?php
							if(isset($_REQUEST['status']))
							{
								if($_REQUEST['status']=='1')
								{
						?>
									<strong class="success">Logged out successfully.</strong>
						<?php
								}
								elseif($_REQUEST['status']=='2')
								{
						?>
									<strong class="error">Please login, First.</strong>
						<?php
								}
								else
								{
								}
							}
						?> 
						<form autocomplete="off" enctype="multipart/form-data" name="ULoginForm" ng-submit="submitData(ULogin)" novalidate>
							<h1>Login</h1>
							<div>
								<input type="text" required autofocus placeholder="Username." maxlength="25" name="username" class="form-control" id="username" ng-model="ULogin.username" ng-minlength="6" ng-maxlength="20" />
								<div class="error" ng-show="ULoginForm.username.$dirty && ULoginForm.username.$invalid">
									<small class="error" ng-show="ULoginForm.username.$error.required">Username is required.</small>
									<small class="error" ng-show="ULoginForm.username.$error.minlength">Username is required to be at least 6 characters</small>
									<small class="error" ng-show="ULoginForm.username.$error.maxlength">Username cannot be longer than 20 characters</small>
								</div>								
								<p>&nbsp;</p>
							</div>
							<div>
								<input type="password" required placeholder="Password" maxlength="20" name="password" class="form-control" id="Password" ng-model="ULogin.password" ng-minlength="8" ng-maxlength="20" />
								<div class="error" ng-show="ULoginForm.password.$dirty && ULoginForm.password.$invalid">
									<small class="error" ng-show="ULoginForm.password.$error.required">Password is required.</small>
									<small class="error" ng-show="ULoginForm.password.$error.minlength">Password is required to be at least 8 characters</small>
									<small class="error" ng-show="ULoginForm.password.$error.maxlength">Password cannot be longer than 20 characters</small>
								</div>							
								<p>&nbsp;</p>
							</div>							
							<div>
								<input type="submit" name="submit" value="Login" class="btn btn-default submit" ng-disabled="ULoginForm.$invalid" />
							</div>
							<div class="clearfix"></div>
							<div class="separator">&nbsp;</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
}
else
{
	echo "<script language=\"javascript\">window.location=\"welcome.php\";</script>";
}
?>