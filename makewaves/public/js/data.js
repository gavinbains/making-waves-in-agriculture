var app = angular.module('DataApp', ['n3-line-chart'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('DataCtrl', function ($scope, $http) {
    $scope.data;
    $scope.salt_alerts = [];
    $scope.electric_alerts = [];
    $scope.volume_alerts = [];
    $scope.soil_alerts = [];
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

    
    $http({
        method: 'GET',
        url: '/data'
    }).then(function successCallback(response) {
        $scope.data = response.data;
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
        console.log("GET RESPONSE");

        var last_salt = -1;
        var last_electric = -1;
        var last_volume = -1;
        var last_soil = -1;

        for(var i=1; i<52; i++) {
            var prev = $scope.data.weeks[i-1];
            var curr = $scope.data.weeks[i];
            
            if(Math.abs(curr.dissolved_salts-prev.dissolved_salts) > 3.3 && last_salt+1!=i) {
                var s_or_d = "";
                if(curr.dissolved_salts-prev.dissolved_salts>0) {
                    s_or_d = "spike";
                }
                else {
                    s_or_d = "drop";
                }
                var alert = {
                    "alert_type" : s_or_d,
                    "week_number" : i+1,
                    "discrepancy" : Math.abs(curr.dissolved_salts-prev.dissolved_salts).toFixed(2)
                }
                $scope.salt_alerts.push(alert);
                last_salt = i;
            }

            if(Math.abs(curr.electrical_energy-prev.electrical_energy) > 15 && last_electric+1!=i) {
                var s_or_d = "";
                if(curr.electrical_energy-prev.electrical_energy>0) {
                    s_or_d = "spike";
                }
                else {
                    s_or_d = "drop";
                }
                var alert = {
                    "alert_type" : s_or_d,
                    "week_number" : i+1,
                    "discrepancy" : Math.abs(curr.electrical_energy-prev.electrical_energy).toFixed(2)
                }
                $scope.electric_alerts.push(alert);
                last_electric = i;
                console.log(last_electric + " " + i);
            }

            if(Math.abs(curr.volume_of_irrigation_water-prev.volume_of_irrigation_water) > 100 && last_volume+1!=i) {
                var s_or_d = "";
                if(curr.volume_of_irrigation_water-prev.volume_of_irrigation_water>0) {
                    s_or_d = "spike";
                }
                else {
                    s_or_d = "drop";
                }
                var alert = {
                    "alert_type" : s_or_d,
                    "week_number" : i+1,
                    "discrepancy" : Math.abs(curr.volume_of_irrigation_water-prev.volume_of_irrigation_water).toFixed(2)
                }
                $scope.volume_alerts.push(alert);
                last_volume = i;
            }

            if(Math.abs(curr.soil_reaction_ph-prev.soil_reaction_ph) >= 5.0 && last_soil+1!=i) {
                var s_or_d = "";
                if(curr.soil_reaction_ph-prev.soil_reaction_ph>0) {
                    s_or_d = "spike";
                }
                else {
                    s_or_d = "drop";
                }
                var alert = {
                    "alert_type" : s_or_d,
                    "week_number" : i+1,
                    "discrepancy" : Math.abs(curr.soil_reaction_ph-prev.soil_reaction_ph).toFixed(2)
                }
                $scope.soil_alerts.push(alert);
                last_soil = i;
            }
        }
        console.log($scope.salt_alerts);
        console.log($scope.electric_alerts);
        console.log($scope.volume_alerts);
        console.log($scope.soil_alerts);
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
});