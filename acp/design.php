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
	<body class="nav-md" ng-app="DesignModule">
		<div class="container body" ng-controller="DesignController">
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
                                    <h2>Add/update Designation Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" id="DesignForm" autocomplete="off" enctype="multipart/form-data" name="DesignForm"  novalidate>
										<center><strong class="error" ng-hide="contentLoaded">{{getDesignResult}}</strong></center>
										<p>&nbsp;</p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Designation Added</strong>
										</div>
										<input type="hidden" name="id" ng-model="id" value={{design.id}}>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Designation</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12"  autofocus placeholder="Designation." required name="name" id="name" ng-model="name" ng-minlength="3" ng-maxlength="20" />
												<div class="error" ng-show="DesignForm.name.$dirty && DesignForm.name.$invalid">
													<small class="error" ng-show="DesignForm.name.$error.required">name is required.</small>
													<small class="error" ng-show="DesignForm.name.$error.minlength">name is required to be at least 3 characters</small>
													
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Description</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" placeholder="Description." name="address" id="address" ng-model="address"></textarea>
                                            </div>
                                        </div>
                                
                                        
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit"   class="btn btn-success" ng-disabled="DesignForm.$invalid" ng-show='add_design' ng-click="submitData()" />Submit</button>
												<button  class="btn btn-success" ng-click="cancelData()" />cancel</button>
												<button type="submit" class="btn btn-success"    ng-show='update_design'  ng-click="update_designation()">Update</button>               
                                            </div>
											
                                        </div>
										
<table border=1 class="table table-striped table-condensed table-hover">
<thead>
<th>S.NO&nbsp;<a ng-click="sort_by('id')"><i class="icon-sort"></i></a></th>
<th>Designation Name&nbsp;<a ng-click="sort_by('name')"><i class="icon-sort"></i></a></th>
<th>Description&nbsp;<a ng-click="sort_by('description')"><i class="icon-sort"></i></a></th>
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

<tbody ng-init="get_designation()">
<tr ng-repeat="design in pagedItems">
<td>{{ $index+1 }}</td>
<td>{{ design.name | uppercase }}</td>
<td>{{ design.description }}</td> 

<td><a href="" ng-click="edit_design(design.id)">Edit</a> | <a href="" ng-click="delete_design(design.id)">Delete</a></td>
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