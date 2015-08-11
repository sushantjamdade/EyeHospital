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
	<body class="nav-md" ng-app="ListHospitalModule">
		<div class="container body" ng-controller="ListHospitalController">
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
                                    <h3>Hospital List</h3>
                                    <div class="clearfix"></div>
                                </div>
								<table border=1 class="table table-striped table-condensed table-hover">
<thead>
<th>S.NO&nbsp;<a ng-click="sort_by('id')"><i class="icon-sort"></i></a></th>
<th>Product Name&nbsp;<a ng-click="sort_by('name')"><i class="icon-sort"></i></a></th>
<th>Product Description&nbsp;<a ng-click="sort_by('description')"><i class="icon-sort"></i></a></th>
<th>Product Price&nbsp;<a ng-click="sort_by('field3')"><i class="icon-sort"></i></a></th>
<th>Product Quantity&nbsp;<a ng-click="sort_by('field4')"><i class="icon-sort"></th> 
<th>Action&nbsp;<a ng-click="sort_by('field5')"><i class="icon-sort"></i></a></th> 
</thead> 
<tfoot>
<td colspan="6">
<div class="pagination pull-right">
<ul>
<li ng-class="{disabled: currentPage == 0}">
<a href ng-click="prevPage()">� Prev</a>
</li>
<li ng-repeat="n in range(pagedItems.length)"
ng-class="{active: n == currentPage}"
ng-click="setPage()">
<a href ng-bind="n + 1">1</a>
</li>
<li ng-class="{disabled: currentPage == pagedItems.length - 1}">
<a href ng-click="nextPage()">Next �</a>
</li>
</ul>
</div>
</td>
</tfoot>
<tbody ng-init="get_product()">
<tr ng-repeat="product in pagedItems">
<td>{{ $index+1 }}</td>
<td>{{ product.prod_name | uppercase }}</td>
<td>{{ product.prod_desc }}</td> 
<td>{{ product.prod_price }}</td>

<td>{{ product.prod_quantity }}</td>

<td><a href="" ng-click="prod_edit(product.id)">Edit</a> | <a href="" ng-click="prod_delete(product.id)">Delete</a></td>
</tr> 
</tbody>
</table>

<?php
}
?>