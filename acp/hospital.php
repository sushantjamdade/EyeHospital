<?php
//Created by: pallavi
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
	<body class="nav-md" ng-app="HospitalModule">
		<div class="container body" ng-controller="HospitalController">
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
                                    <h2>Add Hospital Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="HospitalForm" autocomplete="off" enctype="multipart/form-data" name="HospitalForm" ng-submit="submitData(UHospital)" novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getHospitalResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Form Added Succuessfully</strong>
										</div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">Hospital Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Hopital Name." required name="hname" id="hname" ng-model="UHospital.hname" ng-minlength="3" ng-maxlength="20" />
												<div class="error" ng-show="HospitalForm.hname.$dirty && HospitalForm.hname.$invalid">
													<small class="error" ng-show="HospitalForm.hname.$error.required">name is required.</small>
													<small class="error" ng-show="HospitalForm.hname.$error.minlength">name is required to be at least 3 characters</small>
													
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="Address" name="address" id="address" ng-model="UHospital.address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="City" required name="city" id="city" ng-model="UHospital.city"  />
												<div class="error" ng-show="HospitalForm.city.$dirty && HospitalForm.city.$invalid">
													<small class="error" ng-show="HospitalForm.city.$error.required">city is required.</small>
													
													
												</div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12" placeholder="State"  name="State1" id="State1" ng-model="UHospital.State1"  />
												
                                            </div>
											</div>
											<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Pin Code</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="Pin Code" required name="pin" id="pin" ng-model="UHospital.pin" ng-minlength="6" ng-maxlength="6" />
											<div class="error" ng-show="HospitalForm.pin.$dirty && HospitalForm.pin.$invalid">
													<small class="error" ng-show="HospitalForm.pin.$error.required">Number is required.</small>
													<small class="error" ng-show="HospitalForm.pin.$error.minlength">pincode is required length to be 6</small>
													<small class="error" ng-show="HospitalForm.pin.$error.maxlength">pincode is not more than 6</small>
												</div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emailid">Email Id</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="email" class="form-control col-md-7 col-xs-12"  placeholder="Email ID" required name="emailid" id="emailid" ng-model="UHospital.emailid"  />
											<div class="error" ng-show="HospitalForm.emailid.$dirty && HospitalForm.emailid.$invalid">
													<small class="error" ng-show="HospitalForm.emailid.$error.required">Email ID is required.</small>
													<small class="error" ng-show="HospitalForm.emailid.$error.email">not valid email id</small>
													
												</div>
                                            </div>
                                        </div>
											<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phno">Phone number</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="tel" class="form-control col-md-7 col-xs-12"  ng-pattern="/^[0-9]*$/" placeholder="Phone number" required name="phno" id="phno" ng-model="UHospital.phno"  ng-minlength="10" ng-maxlength="10" />
											<div class="error" ng-show="HospitalForm.phno.$dirty && HospitalForm.phno.$invalid">
													<small class="error" ng-show="HospitalForm.phno.$error.required">Phone number is required.</small>
													<small class="error" ng-show="HospitalForm.phno.$error.minlength">Phone number not less than 10</small>
													<small class="error" ng-show="HospitalForm.phno.$error.maxlength">Phone number not more than 10</small>
													<small class="error" ng-show="HospitalForm.phno.$error.pattern">pls match the pattern[333333333]</small>
												</div>
                                            </div>
                                        </div>
										
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit"   class="btn btn-success" ng-disabled="HospitalForm.$invalid" />Submit</button>
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