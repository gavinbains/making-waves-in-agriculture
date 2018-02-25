var app = angular.module('DataApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('DataCtrl', function ($scope, $http) {
    $scope.data;
    $scope.getData = function(id) {
        $http({
            method: 'GET',
            url: '/data'
        }).then(function successCallback(response) {
            $scope.data = response.data;
            console.log("GET RESPONSE");
        });
        console.log("GETTING JSON DATA");
    };

    $http.get("http://localhost:3000/db")
    .then(function(response) {
        $scope.data = response.data;
        console.log(response.data);
    });
    

    console.log("RUNNING JS FILE");
});