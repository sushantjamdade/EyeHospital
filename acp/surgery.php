<?php
//Created by: pallavi
//Date: 12-August-2015
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
	<body class="nav-md" ng-app="listpp">
		<div class="container body" ng-controller="PhoneListCtrl">
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
                                    <h2>Add Surgery</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="SurgeryForm" autocomplete="off" enctype="multipart/form-data" name="SurgeryForm"  novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getSurgeryResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Surgery Added</strong>
										</div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Surgergy Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Surgery Name." required name="name" id="name" ng-change="changeSurgery(USurgery)" ng-model="name" ng-minlength="3" ng-maxlength="20" />
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
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="Description." name="address" id="address" ng-model="address"></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fees">Fee</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Fees." required name="fees" id="fees" ng-model="fees"  />
												<div class="error" ng-show="SurgeryForm.fees.$dirty && SurgeryForm.fees.$invalid">
													<small class="error" ng-show="SurgeryForm.fees.$error.required">Fee is required</small>
													
													
												</div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                <button type="submit" name="add"  class="btn btn-success" ng-disabled="SurgeryForm.$invalid" ng-show="add_sur"  ng-click="surgery_submit()" />Submit</button>
								<button  class="btn btn-success" ng-click="cancelData()" />cancel</button>
                                <button type="submit" class="btn btn-success"  name="update_surgery"  ng-show='update_prod' value="Update" ng-click="update_surgery()">Update</button>                  
											
                                        </div>
<br/>
<br/>
<table border=1 class="table table-striped table-condensed table-hover">
<thead>
<th>S.NO&nbsp;<a ng-click="sort_by('id')"><i class="icon-sort"></i></a></th>
<th>Surgery Name&nbsp;<a ng-click="sort_by('name')"><i class="icon-sort"></i></a></th>
<th>Description&nbsp;<a ng-click="sort_by('description')"><i class="icon-sort"></i></a></th>
<th>Fees&nbsp;<a ng-click="sort_by('field3')"><i class="icon-sort"></i></a></th>
<th>Action&nbsp;<a ng-click="sort_by('field5')"><i class="icon-sort"></i></a></th> 
</thead> 
<tfoot>
<td colspan="9">
<div class="pagination pull-right">
<ul>
<li ng-class="{disabled: currentPage == 0}">
<a href ng-click="prevPage()">« Prev</a>
</li>
<li ng-repeat="n in range(pagedItems.length)"
ng-class="{active: n == currentPage}"
ng-click="setPage()">
<a href ng-bind="n + 1">1</a>
</li>
<li ng-class="{disabled: currentPage == pagedItems.length - 1}">
<a href ng-click="nextPage()">Next »</a>
</li>
</ul>
</div>
</td>
</tfoot>
<input type="hidden" name="id" ng-model="id"value={{surgery.id}}>
<tbody ng-init="get_surgery()">
<tr ng-repeat="surgery in pagedItems">
<td>{{ $index+1 }}</td>
<td>{{ surgery.Surgery_Name | uppercase }}</td>
<td>{{ surgery.Description }}</td> 
<td>{{ surgery.fees }}</td> 
<td><a href="" ng-click="edit_surgery(surgery.id)">Edit</a> | <a href="" ng-click="delete_surgery(surgery.id)">Delete</a></td>
</tr> 
</tbody>
</table>
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