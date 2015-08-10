<?php
//Created by: pallavi
//Date: 10-August-2015
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
	<body class="nav-md" ng-app="EmployeeModule">
		<div class="container body" ng-controller="EmployeeController">
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
                                    <h2>Add Employee</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="EmployeeForm" autocomplete="off" enctype="multipart/form-data" name="EmployeeForm" ng-submit="submitData(UEmployee)" novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getEmployeeResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Form Added Succuessfully</strong>
										</div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">Employee Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Employee Name." required name="name" id="name" ng-model="UEmployee.name" ng-minlength="3" ng-maxlength="20" />
												<div class="error" ng-show="EmployeeForm.name.$dirty && EmployeeForm.name.$invalid">
													<small class="error" ng-show="EmployeeForm.name.$error.required">name is required.</small>
													<small class="error" ng-show="EmployeeForm.name.$error.minlength">name is required to be at least 3 characters</small>
													
												</div>
                                            </div>
                                        </div>
										
										<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
                                       <input id="birthday" class="date-picker form-control" placeholder="Date Of Birth" required="required" type="text" ng-model="UEmployee.dob">
									   </div>
                                            </div>
										
										     <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BloodGroup">Blood Group</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="Blood Group" required name="bgroup" id="bgroup" ng-model="UEmployee.bgroup"  />
												<div class="error" ng-show="EmployeeForm.bgroup.$dirty && EmployeeForm.bgroup.$invalid">
													<small class="error" ng-show="EmployeeForm.bgroup.$error.required">Blood group is required.</small>
													
													
												</div>
                                            </div>
                                        </div>
										
										<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Joining </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
                                       <input id="Joining" class="date-picker form-control" placeholder="Date Of Joining" required="required" type="text" ng-model="UEmployee.doj">
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
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="City" required name="city" id="city" ng-model="UEmployee.city"  />
												<div class="error" ng-show="EmployeeForm.city.$dirty && EmployeeForm.city.$invalid">
													<small class="error" ng-show="EmployeeForm.city.$error.required">city is required.</small>
													
													
												</div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12" placeholder="State"  name="State1" id="State1" ng-model="UEmployee.State1"  />
												
                                            </div>
											</div>
											<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Pin Code</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="Pin Code" required name="pin" id="pin" ng-model="UEmployee.pin" ng-minlength="6" ng-maxlength="6" />
											<div class="error" ng-show="EmployeeForm.pin.$dirty && EmployeeForm.pin.$invalid">
													<small class="error" ng-show="EmployeeForm.pin.$error.required">Number is required.</small>
													<small class="error" ng-show="EmployeeForm.pin.$error.minlength">pincode is required length to be 6</small>
													<small class="error" ng-show="EmployeeForm.pin.$error.maxlength">pincode is not more than 6</small>
												</div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emailid">Email Id</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="email" class="form-control col-md-7 col-xs-12"  placeholder="Email ID" required name="emailid" id="emailid" ng-model="UEmployee.emailid"  />
											<div class="error" ng-show="EmployeeForm.emailid.$dirty && EmployeeForm.emailid.$invalid">
													<small class="error" ng-show="EmployeeForm.emailid.$error.required">Email ID is required.</small>
													<small class="error" ng-show="EmployeeForm.emailid.$error.email">not valid email id</small>
													
												</div>
                                            </div>
                                        </div>
											<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phno">Phone number</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="tel" class="form-control col-md-7 col-xs-12"  ng-pattern="/^[0-9]*$/" placeholder="Phone number" required name="phno" id="phno" ng-model="UEmployee.phno"  ng-minlength="10" ng-maxlength="10" />
											<div class="error" ng-show="EmployeeForm.phno.$dirty && EmployeeForm.phno.$invalid">
													<small class="error" ng-show="EmployeeForm.phno.$error.required">Phone number is required.</small>
													<small class="error" ng-show="EmployeeForm.phno.$error.minlength">Phone number not less than 10</small>
													<small class="error" ng-show="EmployeeForm.phno.$error.maxlength">Phone number not more than 10</small>
													<small class="error" ng-show="EmployeeForm.phno.$error.pattern">pls match the pattern[333333333]</small>
												</div>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
										  <!-- select as label for (key, value) in object -->
                          <select ng-model="UEmployee.selectedDesignation" ng-options="design.id as design.name for design in designAccounts">
                          <option value="">Select designation</option>
                            </select>
							</div>
											
                                        </div>
										
				                   <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualifiaction">Qualification</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" class="form-control col-md-7 col-xs-12"  placeholder="Qualification" required name="Qualification" id="Qualification" ng-model="UEmployee.Qualification"  />
												<div class="error" ng-show="EmployeeForm.Qualification.$dirty && EmployeeForm.Qualification.$invalid">
													<small class="error" ng-show="EmployeeForm.Qualification.$error.required">Qualification is required.</small>
													
													
												</div>
                                            </div>
                                        </div>						
										
										
										
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Specialization">Specialization</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
										  <!-- select as label for (key, value) in object -->
                          <select ng-model="UEmployee.selectedSpecial" ng-options="specialization.id as specialization.name for specialization in specialAccounts">
                          <option value="">Select Specialization</option>
                            </select>
							</div>
											
                                   </div>
										
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit"   class="btn btn-success" ng-disabled="EmployeeForm.$invalid" />Submit</button>
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
		<!-- daterangepicker -->
							<script type="text/javascript">
						$(document).ready(function () {
							$('#birthday').daterangepicker({
								singleDatePicker: true,
								calender_style: "picker_4"
							}, function (start, end, label) {
								console.log(start.toISOString(), end.toISOString(), label);
							});
							
							$('#Joining').daterangepicker({
								singleDatePicker: true,
								calender_style: "picker_4"
							}, function (start, end, label) {
								console.log(start.toISOString(), end.toISOString(), label);
							});
							
						});
					</script>
						<script type="text/javascript">
						$(document).ready(function () {
							
							
							$('#Joining').daterangepicker({
								singleDatePicker: true,
								calender_style: "picker_4"
							}, function (start, end, label) {
								console.log(start.toISOString(), end.toISOString(), label);
							});
							
						});
					</script>


		<!-- daterangepicker -->
		<script type="text/javascript" src="js/moment.min2.js"></script>
		<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
		<!-- daterangepicker -->
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>