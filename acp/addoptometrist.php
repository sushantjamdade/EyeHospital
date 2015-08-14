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
<html lang="en" >
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/script.js"></script>
	
		
	</head>
	<body class="nav-md" ng-app="OptometristModule">
		<div class="container body" ng-controller="OptometristController">
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
                                    <h2>Add Optometrist</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="OptometristForm" autocomplete="off" enctype="multipart/form-data" name="OptometristForm" ng-submit="submitData(UOptometrist)" novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getOptometristResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Form Added Succuessfully</strong>
										</div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mrno">MRNO</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
										  <!-- select as label for (key, value) in object -->
                          <select ng-model="UOptometrist.selectedMR" ng-options="design.id as design.name for design in MRAccounts">
                          <option value="">Select MRNO</option>
                            </select>
							</div>
											
                                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">Present Glass Description</label>
						<label class="control-label col-md-9 col-sm-9 col-xs-12" for="hname">&nbsp;</label>
						<label class="control-label col-md-12 col-sm-12 col-xs-12" for="hname">&nbsp;</label>
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">&nbsp;</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hname">Sphere</label>
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hname">Sphere</label>
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hname">Sphere</label>
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hname">Sphere</label>
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hname">Sphere</label>	
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">Right</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-controlx col-md-2 col-xs-2 col-xs-12" placeholder="First" />
								<input type="text" class="form-controlx col-md-2 col-xs-2 col-xs-12" placeholder="Second" />
								<input type="text" class="form-controlx col-md-2 col-xs-2 col-xs-12" placeholder="third" />
								<input type="text" class="form-controlx col-md-2 col-xs-2 col-xs-12" placeholder="fourth" />
								<input type="text" class="form-controlx col-md-2 col-xs-2 col-xs-12" placeholder="fourth" />
							</div>
						</div>					
					   <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Complaint">Complaint</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="Complaint" name="Complaint" id="Complaint" ng-model="UOptometrist.address"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="History">History</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="History" name="History" id="History" ng-model="UOptometrist.History"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dilation">Dilation</label>
                                 <label for="Yes">Yes</label>
    <input id="Yes" type="radio" ng-model="UOptometrist.dilation" value="Yes" />

    <label for="No">No</label>
    <input id="No" type="radio" ng-model="UOptometrist" value="No" /><br />

    				</div>
										
		     <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NCT">NCT</label>
                                 <label for="Right">Right</label>
    <input id="Right" type="radio" ng-model="UOptometrist" value="Right" />

    <label for="Left">Left</label>
    <input id="Left" type="radio" ng-model="UOptometrist" value="Left" /><br />

    				</div>	

                                 <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dominant">Dominant Eye</label>
                                 <label for="Right">Right</label>
    <input id="Right" type="radio" ng-model="UOptometrist" value="Right" />

    <label for="Left">Left</label>
    <input id="Left" type="radio" ng-model="UOptometrist" value="Left" /><br />

    				</div>						
			<div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dieases">Dieases</label>							
		<label for="basicCheck">DM</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />		                   
		&nbsp;&nbsp;<label for="basicCheck">Hypertension</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">CVA</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Asthama</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Heart Disease</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
	
						</div>	
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dieases">Allergies</label>							
		<label for="basicCheck">NILL</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />		                   
		&nbsp;&nbsp;<label for="basicCheck">Pencillin</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Xylocaine</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Sulpha</label>
<input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Atropin</label>
<input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Drosyn</label>
   						
								</div>	
<div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dieases">Treatment</label>							
		<label for="basicCheck">AntiCoagulants</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />		                   
		&nbsp;&nbsp;<label for="basicCheck">Insulin</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Antipsychotis</label>
    <input id="basicCheck" type="checkbox" ng-model="UOptometrist" />	
&nbsp;&nbsp;<label for="basicCheck">Others</label>
   						
								</div>	
 								
                                  
							 <input type="file" ng-file-select="onFileSelect($files)" >			
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
		
						


		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>