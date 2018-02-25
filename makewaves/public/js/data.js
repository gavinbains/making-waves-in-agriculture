var app = angular.module('DataApp', ['n3-line-chart'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('DataCtrl', function ($scope, $http) {
    $scope.data;

    $scope.salt_data = {
        dataset0: []
    };
    $scope.electric_data = {
        dataset1: []
    };
    $scope.volume_data = {
        dataset2: []
    };
    $scope.soil_data = {
        dataset3: []
    };

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
        console.log($scope.data);
        for(var i=0; i<52; i++) {
            var salt = {
                        "x": i+1,
                        "dissolved_salts" : $scope.data.weeks[i].dissolved_salts
                    }
            var electric = {
                        "x": i+1,
                        "electrical_energy" : $scope.data.weeks[i].electrical_energy
                    }
            var volume = {
                        "x": i+1,
                        "volume_of_irrigation_water" : $scope.data.weeks[i].volume_of_irrigation_water
                    }
            var soil = {
                        "x": i+1,
                        "soil_reaction_ph" : $scope.data.weeks[i].soil_reaction_ph
                    }
            $scope.salt_data.dataset0.push(salt);
            $scope.electric_data.dataset1.push(electric);
            $scope.volume_data.dataset2.push(volume);
            $scope.soil_data.dataset3.push(soil);
        }
        console.log($scope.graph_data);
    });

    $scope.salt_options = {
        series: [
            {
                axis: "y",
                dataset: "dataset0",
                key: "dissolved_salts",
                label: "Dissolved Salts (mg/m^3)",
                color: "#5F6A6A",
                type: ['line', 'dot', 'area'],
                id: 'salts'
            }
        ],
        axes: {x: {key: "x"}}
    };
    $scope.electric_options = {
        series: [
            {
                axis: "y",
                dataset: "dataset1",
                key: "electrical_energy",
                label: "Electrical Energy (kWh)",
                color: "#116764",
                type: ['line', 'dot', 'area'],
                id: 'electric'
            }
        ],
        axes: {x: {key: "x"}}
    };
    $scope.volume_options = {
        series: [
            {
                axis: "y",
                dataset: "dataset2",
                key: "volume_of_irrigation_water",
                label: "Volume of Irrigation Water (Ha-m)",
                color: "#21618C",
                type: ['line', 'dot', 'area'],
                id: 'volume'
            }
        ],
        axes: {x: {key: "x"}}
    };
    $scope.soil_options = {
        series: [
            {
                axis: "y",
                dataset: "dataset3",
                key: "soil_reaction_ph",
                label: "Soil Reaction (pH)",
                color: "#633974",
                type: ['line', 'dot', 'area'],
                id: 'soil'
            }
        ],
        axes: {x: {key: "x"}}
    };
    

    console.log("RUNNING JS FILE");
});