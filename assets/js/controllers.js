'use strict';

/* Controllers */

peopleApp.controller("people", function($scope, $http, $filter) {

    /* read whole data */
    $scope.people = [];

    var dataUrl = config.base + 'main/readAll';

    $http.get(dataUrl).success(function(data) {
        $scope.people = data;
    });
    /* end */

    // refresh data
    $scope.refresh = function() {
        $http.get(dataUrl).success(function(data) {
            $scope.people = data;
        });
    };
    /* end */

    /* sort data */
    $scope.orderData = function(order) {
        $scope.reverse = ($scope.order === order) ? !$scope.reverse : false;
        $scope.order = order;
    };
    /* end */

    /* Show Search Result Count */
    $scope.searchResultCount = function(search) {
        $scope.searchResultLength = search.length;
    };
    /* end */

    /* load more data */
    $scope.showData = function() {
        var pagesShown = 1;
        var pageSize = 5;

        $scope.paginationLimit = function(data) {
            return pageSize * pagesShown;
        };

        $scope.hasMoreItemsToShow = function() {
            return pagesShown < ($scope.people.length / pageSize);
        };

        $scope.showMoreItems = function() {
            pagesShown = pagesShown + 1;
        };
    };
    /* end */

    /* create data */
    $scope.create = function() {
        $http({
            method: 'POST',
            url: config.base + 'main/create',
            headers: {
                "Content-Type": "application/json"
            },
            params: {
                name: $scope.name,
                city: $scope.city,
                country: $scope.country,
                image: $scope.image
            }
        }).success(function(data) {
            $scope.refresh();
            // clear fields
            $scope.name = '';
            $scope.city = '';
            $scope.country = '';
            $scope.image = '';
        });
    };
    /* end */

    /* read record */
    $scope.read = function() {
        $scope.readPerson = this.row;
        var id = $scope.readPerson.id;

        $http({
            method: 'POST',
            url: config.base + 'main/read',
            headers: {
                "Content-Type": "application/json"
            },
            params: {
                id: id
            }
        }).success(function(data) {
            $scope.readPerson = data;
        });
    };
    /* end */

    /* update record */
    $scope.update = function() {
        $scope.updateData = this.row;
        var id = $scope.updateData.id;

	    $http({
            method: 'POST',
            url: config.base + 'main/read',
            headers: {
                "Content-Type": "application/json"
            },
            params: {
                id: id
            }
        }).success(function(data) {
            $scope.readPerson = data;
        });
    };

    $scope.updateSubmit = function() {
        $http({
            method: 'POST',
            url: config.base + 'main/update',
            headers: {
                "Content-Type": "application/json"
            },
            params: {
                id: $scope.readPerson.id,
                name: $scope.readPerson.name,
                city: $scope.readPerson.city,
                country: $scope.readPerson.country,
                image: $scope.readPerson.image
            }
        }).success(function(data) {
            $scope.refresh();
        });
    };
    /* end */

    /* delete data */
    $scope.delete = function() {
        var personRow = this.row;

        $http({
            method: 'POST',
            url: config.base + 'main/delete',
            headers: {
                "Content-Type": "application/json"
            },
            params: {
                id: personRow.id
            }
        }).success(function(data) {
            $scope.refresh();
        });
    };
    /* end */

    /* variables */
    $scope.peopleLength = $scope.people.length;
    /* end */

});