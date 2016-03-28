<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn angular</title>

    <!-- css assets -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">

    <!-- js assets -->
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/angular/angular.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/ng_ckeditor.js"></script>
	<script>
	/* config variables */
	var config = {
		base: "<?=base_url()?>"
	};

	/* filemanager scripts */
	function open_popup(url)
	{
	    var w = 880;
	    var h = 570;
	    var l = Math.floor((screen.width-w)/2);
	    var t = Math.floor((screen.height-h)/2);
	    var win = window.open(url, 'Filemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
	}
	function responsive_filemanager_callback(field_id){
		$("#"+field_id).change();
	}
	/* end */
	$(document).ready(function(){
		$("#createdescr").blur(function(){
			$("#createdescr").change();
		});
	});
	</script>
	<script src="<?=base_url()?>assets/js/app.js"></script>
</head>
<body ng-app="peopleApp" ng-controller="people" ng-init="showData()">

<div class="container">

	<h1>Codeigniter <?=CI_VERSION?> + angular.js</h1>

	<hr />

	<button type="button" class="btn" data-toggle="modal" data-target="#createModal">Create Record</button>

	<hr />

	<table class="table table-hover" id="table">
		<caption>
			<p>People whole count: {{people.length}}</p>
			<p ng-show="searchResultLength > 0">Search result count: {{filteredCount.length}}</p>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" ng-model="search" ng-keyup="searchResultCount(search)">
			</div>
			<button ng-click="order='reverse'" class="btn">Reset Sorting</button>
		</caption>
		<thead>
			<tr>
				<th>
					<span ng-click="orderData('name')" class="sort-btn">
						Name <span ng-hide="order === 'name'" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
					</span>
					<span class="sortorder" ng-show="order === 'name'" ng-class="{reverse:reverse}"></span>
				</th>
				<th>
					<span ng-click="orderData('city')" class="sort-btn">
						City <span ng-hide="order === 'city'" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
					</span>
					<span class="sortorder" ng-show="order === 'city'" ng-class="{reverse:reverse}"></span>
				</th>
				<th>
					<span ng-click="orderData('country')" class="sort-btn">
						Country <span ng-hide="order === 'country'" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
					</span>
					<span class="sortorder" ng-show="order === 'country'" ng-class="{reverse:reverse}"></span>
				</th>
				<th class="text-center">Read</th>
				<th class="text-center">Update</th>
				<th class="text-center">
					Delete
					<a class="btn btn-xs btn-default" ng-click="multiDelete()">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="row in filteredCount = (people | filter:search) | orderBy: order:reverse | limitTo: paginationLimit()">
				<td>{{ row.name }}</td>
				<td>{{ row.city }}</td>
				<td>{{ row.country }}</td>
				<td class="text-center">
					<a class="btn btn-xs btn-default" data-toggle="modal" data-target="#readModal" ng-click="read()">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</a>
				</td>
				<td class="text-center">
					<a class="btn btn-xs btn-default" data-toggle="modal" data-target="#updateModal" ng-click="update()">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					</a>
				</td>
				<td class="text-center">
					<a class="btn btn-xs btn-default" ng-click="delete()">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
					<input type="checkbox" class="multi-delete" ng-value="row.id" ng-model="row.selected" />
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6">
					<button ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()" class="btn">Show more</button>
				</td>
			</tr>
		</tfoot>
	</table>

	<p>Page rendered in <strong>{elapsed_time}</strong> seconds. Environment: <b><?=ENVIRONMENT?></b></p>

</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" role="dialog">
	<div class="modal-dialog">
	  	<!-- Modal content-->
	  	<div class="modal-content">
	    	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		<h4 class="modal-title">Create Data</h4>
	    	</div>
			<form ng-submit="create()" class="modal-body" role="form" method="POST">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" ng-model="createname" />
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" ng-model="createcity" />
				</div>
				<div class="form-group">
					<label>Country</label>
					<input type="text" class="form-control" ng-model="createcountry" />
				</div>
				<div class="form-group form-inline">
					<label>Image</label>
					<div class="form-inline">
						<input type="text" id="createimage" class="form-control" ng-model="createimage" />
						<a href="javascript:open_popup('filemanager/dialog.php?type=2&popup=1&field_id=createimage')" class="btn btn-default">Select</a>
					</div>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea ckeditor="editorOptions" id="createdescr" class="form-control" ng-model="createdescr"></textarea>
				</div>

				<button type="submit" id="createData" class="btn btn-default btn-primary">Create Record</button>
			</form>
			<div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
	  	</div>
	</div>
</div>

<!-- Read Modal -->
<div class="modal fade" id="readModal" role="dialog">
	<div class="modal-dialog">
	  	<!-- Modal content-->
	  	<div class="modal-content">
	    	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		<h4 class="modal-title">Read Data</h4>
	    	</div>
		    <div class="modal-body">
		    	<p>{{ readPerson.name }}</p>
		      	<img ng-show="readPerson.image" ng-src="{{ readPerson.image }}" class="img-thumbnail img-square" />
		      	<img ng-hide="readPerson.image" src="<?=base_url()?>uploads/gravatar.jpg" class="img-thumbnail img-square" />
		      	<br /><br />
		      	<p>{{ readPerson.city }}</p>
		      	<p>{{ readPerson.country }}</p>
		      	<hr />
		      	<div ng-bind-html="readPerson.descr | unsafe"></div>
		    </div>
		    <div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
	  	</div>
	</div>
</div>
<!-- End -->

<!-- Update Modal -->
<div class="modal fade" id="updateModal" role="dialog">
	<div class="modal-dialog">
	  	<!-- Modal content-->
	  	<div class="modal-content">
	    	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		<h4 class="modal-title">Update Data</h4>
	    	</div>
		    <form ng-submit="updateSubmit()" role="form" method="POST" class="modal-body">
		    	<div class="form-group">
		    		<label for="updatename">Name</label>
		    		<input type="text" id="updatename" ng-model="readPerson.name" class="form-control" />
		    	</div>
		    	<div class="form-group">
		    		<label for="updatecity">City</label>
		    		<input type="text" id="updatecity" ng-model="readPerson.city" class="form-control" />
		    	</div>
		    	<div class="form-group">
		    		<label for="updatecountry">Country</label>
		    		<input type="text" id="updatecountry" ng-model="readPerson.country" class="form-control" />
		    	</div>
		    	<img ng-show="readPerson.image" ng-src="{{ readPerson.image }}" class="img-thumbnail img-square" />
		      	<img ng-hide="readPerson.image" src="<?=base_url()?>uploads/gravatar.jpg" class="img-thumbnail img-square" />
		      	<br /><br />
		    	<div class="form-group form-inline">
					<label for="updateimage">Image</label>
					<div class="form-inline">
						<input type="text" id="updateimage" class="form-control" ng-model="readPerson.image" />
						<a href="javascript:open_popup('filemanager/dialog.php?type=2&popup=1&field_id=updateimage')" class="btn btn-default">Select</a>
					</div>
				</div>
				<div class="form-group">
					<label for="updatedescr">Description</label>
					<textarea ckeditor="editorOptions" id="updatedescr" class="form-control editor" ng-model="readPerson.descr"></textarea>
				</div>

		    	<button type="submit" class="btn btn-default btn-primary">Update Record</button>
		    </form>
		    <div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
	  	</div>
	</div>
</div>
<!-- End -->

</body>
</html>