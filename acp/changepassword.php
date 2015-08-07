<?php
session_start();
if($_SESSION['apid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "db/db_connection.php";	
	$apid = $_SESSION['apid'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/script.js"></script>
	</head>
	<body class="nav-md" ng-app="ChangePwdModule">
		<div class="container body" ng-controller="ChangePwdController">
            <!-- sidebar navigation -->
				<?php include_once ("sidebar.php"); ?>
            <!-- /sidebar navigation -->			

            <!-- top navigation -->
				<?php include_once ("top.php"); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Change Password<small>different form elements</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="demo-form2" autocomplete="off" enctype="multipart/form-data" name="UChangePwdForm" ng-submit="submitData(UChangePwd)" novalidate>
										<center><strong class="error">{{getChangePwdResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Password changed successfully.</strong>
										</div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current-password">Current Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" class="form-control col-md-7 col-xs-12" maxlength="20" autofocus placeholder="Current Password." required name="current_pwd" id="current_pwd" ng-model="UChangePwd.current_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.current_pwd.$dirty && UChangePwdForm.current_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.required">Current Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.minlength">Current Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.maxlength">Current Password cannot be longer than 20 characters</small>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new-password">New Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" class="form-control col-md-7 col-xs-12" maxlength="20" placeholder="New Password." required name="new_pwd" id="new_pwd" ng-model="UChangePwd.new_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.new_pwd.$dirty && UChangePwdForm.new_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.required">New Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.minlength">New Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.maxlength">New Password cannot be longer than 20 characters</small>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="re-type-password">Re-Type Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" class="form-control col-md-7 col-xs-12" maxlength="20" placeholder="Re-Type Password." required name="retype_pwd" id="retype_pwd" ng-model="UChangePwd.retype_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.retype_pwd.$dirty && UChangePwdForm.retype_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.required">New Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.minlength">New Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.maxlength">New Password cannot be longer than 20 characters</small>
												</div>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <input type="submit" name="submit" id="submit" value="Change Password" class="btn btn-success" ng-disabled="UChangePwd.$invalid" />
												<input type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-primary" onclick="window.location.href='welcome.php';" />
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
					<?php include_once ("footer.php"); ?>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>