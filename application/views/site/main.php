<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
    <title>Learn angular</title>

    <!-- css assets -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">

    <!-- js assets -->
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/angular/angular.min.js"></script>

    <script>
	var config = {
		base: "<?=base_url()?>"
	};
	</script>
	<script src="<?=base_url()?>assets/js/app.js"></script>
	<script src="<?=base_url()?>assets/js/controllers.js"></script>
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
			<button ng-click="order=''" class="btn">Reset Sorting</button>
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
				<th class="text-center">Delete</th>
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
					<label for="create-name">Insert Your Name</label>
					<input type="text" id="create-name" class="form-control" placeholder="Insert your name" ng-model="name"></input>
				</div>
				<div class="form-group">
					<label for="create-city">Insert Your City</label>
					<input type="text" id="create-city" class="form-control" placeholder="Insert your city" ng-model="city"></input>
				</div>
				<div class="form-group">
					<label for="create-country">Insert Your Country</label>
					<input type="text" id="create-country" class="form-control" placeholder="Insert your Country" ng-model="country"></input>
				</div>
				<div class="form-group">
					<label for="create-image">Insert Image Link</label>
					<input type="text" id="create-image" class="form-control" placeholder="Insert Image Link" ng-model="image"></input>
				</div>

				<button type="submit" class="btn btn-default btn-primary">Create Record</button>
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
		      	<img ng-hide="readPerson.image" src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class="img-thumbnail img-square" />
		      	<br /><br />
		      	<p>{{ readPerson.city }}</p>
		      	<p>{{ readPerson.country }}</p>
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
		    		<label for="update-name">Name</label>
		    		<input type="text" id="update-name" ng-model="readPerson.name" class="form-control" />
		    	</div>
		    	<div class="form-group">
		    		<label for="update-city">City</label>
		    		<input type="text" id="update-city" ng-model="readPerson.city" class="form-control" />
		    	</div>
		    	<div class="form-group">
		    		<label for="update-country">Country</label>
		    		<input type="text" id="update-country" ng-model="readPerson.country" class="form-control" />
		    	</div>
		    	<div class="form-group">
		    		<label for="update-image">Image Link</label>
		    		<input type="text" id="update-image" ng-model="readPerson.image" class="form-control" />
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