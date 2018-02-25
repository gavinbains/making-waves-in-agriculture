<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src={{asset("js/data.js")}}></script>
    </head>
    <body>
        <main role="main" ng-app="DataApp" ng-controller="DataCtrl">
            <button ng-click="getData()">Get Data</button>
            <td><%data.farm.city%>, <%data.farm.country%></td>
            <div class="call-summary-container" ng-repeat="week in data.weeks">
                <td><b>Week <%week.week_number%></b></td>
                <td>Dissolved Salts: <%week.dissolved_salts%> mg/m^3</td>
                <td>Electrical Energy: <%week.electrical_energy%> kWh</td>
                <td>Volume of Irrigation Water: <%week.volume_of_irrigation_water%> Ha-m</td>
                <td>Soil Reaction pH: <%week.soil_reaction_ph%></td>
            </div>
        </main>
    </body>
</html>
