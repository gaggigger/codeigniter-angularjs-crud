'use strict';

/* App Module */

var peopleApp = angular.module('peopleApp', ['ngCkeditor']);

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
        /* 
            Notice that we use filteredCount variable not people.
            Change it to people and see that show more button doesn't hide even when search(filter) result is one record.
            So if you use filter then variable must be filteredCount but if not then change it to people.
        */
        $scope.hasMoreItemsToShow = function(data) {
            return pagesShown < ($scope.filteredCount.length / pageSize);
        };

        $scope.showMoreItems = function(data) {
            pagesShown = pagesShown + 1;
        };
    };
    /* end */

    /* ckeditor options */
    $scope.editorOptions = {
        language: 'en',
        uiColor: '#FAFAFA',
        height: '300px',
        width: '100%',
        filebrowserBrowseUrl : '../filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '../filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '../filemanager/dialog.php?type=1&editor=ckeditor&fldr='
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
                name: $scope.createname,
                city: $scope.createcity,
                country: $scope.createcountry,
                image: $scope.createimage,
                descr: $scope.createdescr
            }
        }).success(function(data) {
            $scope.refresh();
            // clear fields
            $scope.createname = '';
            $scope.createcity = '';
            $scope.createcountry = '';
            $scope.createimage = '';
            $scope.createdescr = '';
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
                image: $scope.readPerson.image,
                descr: $scope.readPerson.descr
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
    /* multi delete */
    $scope.multiDelete = function() {
        $scope.peopleRowArray = [];
        angular.forEach($scope.filteredCount, function(row){
            if (row.selected) {
                $scope.peopleRowArray.push(row.id);
            }
        });
        $http({
            method: 'POST',
            url: config.base + 'main/delete',
            headers: {
                "Content-Type": "application/plain"
            },
            params: {
                idArray: $scope.peopleRowArray.toString()
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

/* filters */

peopleApp.filter('unsafe', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});