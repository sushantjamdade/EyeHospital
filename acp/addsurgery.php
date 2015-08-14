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
<!doctype html>
 
<!-- ng-app used to specify the module name used to define what module have to used to show data in view using the controller. if no any module define the controller than np-app will be blank. -->
 
<html ng-app="listpp" lang="en">
<head>
<?php include_once ("title.php"); ?>
<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js">
</script>

<!-- including the controller file which controlls the data to be presented in html -->
 
<script src="js/angularjs/script.js"></script>
</head>
<!-- sidebar navigation -->
				<?php include_once ("sidebar.php"); ?>
            <!-- /sidebar navigation -->			

            <!-- top navigation -->
				<?php include_once ("top.php"); ?>
            <!-- /top navigation -->

<body class="nav-md" ng-controller="PhoneListCtrl">
<script type="text/javascript">
var sortingOrder = 'name';
</script>
<h4> Eye Hospital</h4>

<br/>
<br/>
<h4>Add /Update Surgery</h4>
<form name="add_product">
<input type="hidden" name="id" ng-model="id">
<input type="text" name="name" ng-model="name" placeholder="Enter Surgery Name">
<input type="text" name="description" ng-model="address" placeholder="Enter  Description">
<input type="text" name="fees" ng-model="fees" placeholder="Enter Fees">

<input type="button" name="submit_product"  value="Submit" ng-click="surgery_submit()">
<input type="button" name="update_product" ng-show='update_prod' value="Update" ng-click="update_surgery()">
</form>
<br/> 
<br/>
<table border=1 class="table table-striped table-condensed table-hover">
<thead>
<th>ID&nbsp;<a ng-click="sort_by('id')"><i class="icon-sort"></i></a></th>
<th>Surgery Name&nbsp;<a ng-click="sort_by('name')"><i class="icon-sort"></i></a></th>
<th>Description&nbsp;<a ng-click="sort_by('description')"><i class="icon-sort"></i></a></th>
<th>Fees&nbsp;<a ng-click="sort_by('field3')"><i class="icon-sort"></i></a></th>

<th>Action&nbsp;<a ng-click="sort_by('field5')"><i class="icon-sort"></i></a></th> 
</thead> 
<tfoot>
<td colspan="6">
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

<tbody ng-init="get_surgery()">
<tr ng-repeat="surgery in pagedItems">
<td>{{ surgery.id }}</td>
<td>{{ surgery.Surgery_Name | uppercase }}</td>
<td>{{ surgery.Description }}</td> 

<td>{{ surgery.fees }}</td> 
<td><a href="" ng-click="edit_surgery(surgery.id)">Edit</a> | <a href="" ng-click="delete_surgery(surgery.id)">Delete</a></td>
</tr> 
</tbody>
</table>
</body>
<!-- footer content -->
					<?php include_once ("footer.php"); ?>
                <!-- /footer content -->
</html>
<?php
}

?>
