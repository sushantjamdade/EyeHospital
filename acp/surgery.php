<?php
//Created by: ManyaSK
//Date: 06-August-2015
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
	<body class="nav-md" ng-app="SurgeryModule">
		<div class="container body" ng-controller="SurgeryController">
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
                                    <h2>Add Surgery<small>different form elements</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="SurgeryForm" autocomplete="off" enctype="multipart/form-data" name="SurgeryForm" ng-submit="submitData(USurgery)" novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getSurgeryResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Surgery Added</strong>
										</div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Surgergy Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Surgery Name." required name="name" id="name" ng-change="changeSurgery(USurgery)" ng-model="USurgery.name" ng-minlength="3" ng-maxlength="20" />
												<div class="error" ng-show="SurgeryForm.name.$dirty && SurgeryForm.name.$invalid">
													<small class="error" ng-show="SurgeryForm.name.$error.required">name is required.</small>
													<small class="error" ng-show="SurgeryForm.name.$error.minlength">name is required to be at least 3 characters</small>
													
												</div>
												<div>{{getChangeSurgery}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Description</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="Description." name="address" id="address" ng-model="USurgery.address"></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fees">Fee</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Fees." required name="fees" id="fees" ng-model="USurgery.fees"  />
												<div class="error" ng-show="SpecialForm.name.$dirty && SpecialForm.name.$invalid">
													<small class="error" ng-show="SurgeryForm.name.$error.required">Fee is required</small>
													
													
												</div>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit"   class="btn btn-success" ng-disabled="SpecialForm.$invalid" />Submit</button>
												<button  class="btn btn-success" ng-click="cancelData()" />cancel</button>
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