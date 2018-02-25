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
            .my-chart {
                margin-bottom: 30px;
            }

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

            #location h1 {
                text-align: center;
            }

            /* Style the tab */
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src={{asset("js/data.js")}}></script>
        
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="{{asset('n3-charts/build/LineChart.js')}}"></script>
        <link rel="stylesheet" href="{{'n3-charts/build/LineChart.css'}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('css/theme.css')}}" type="text/css"> </head>

    </head>
    <body>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center display-1 text-capitalize border border-primary bg-gradient text-light" id="sd\\">AgriWave</h1>
                        <p class="text-success text-center"><b>We're here to deliver a product that connects the agricultural and data digital world using core technologies in modeling and data analytics to enable a variety of consumers to improve productivity, quality, safety, and sustainability.&nbsp;</b></p>
                    </div>
                </div>
            </div>
        </div>
        <main role="main" ng-app="DataApp" ng-controller="DataCtrl">
            <div ng-cloak>
                <div id="location">
                    <h1> <%data.farm.city%>, <%data.farm.country%> </h1>
                </div>
                <div class="my-chart">
                    <linechart data="salt_data" options="salt_options"></linechart>
                </div> <br>
                <div class="my-chart">
                    <linechart data="electric_data" options="electric_options"></linechart>
                </div> <br>
                <div class="my-chart">
                    <linechart data="volume_data" options="volume_options"></linechart>
                </div> <br>
                <div class="my-chart">
                    <linechart data="soil_data" options="soil_options"></linechart>
                </div>
            </div>

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'salt')">Dissolved Salts</button>
                <button class="tablinks" onclick="openCity(event, 'electric')">Electrical Energy</button>
                <button class="tablinks" onclick="openCity(event, 'volume')">Volume of Irrigation Water</button>
                <button class="tablinks" onclick="openCity(event, 'soil')">Soil Reaction pH</button>
            </div>

            <div id="salt" class="tabcontent">
                <h3>Dissolved Salts Alerts</h3>
                <div ng-repeat = "alert in salt_alerts">
                    <p>There was a <%alert.alert_type%> in dissolved salt levels on week <%alert.week_number%> 
                        with a discrepancy of <%alert.discrepancy%> mg/m^3</p>
                </div>
            </div>

            <div id="electric" class="tabcontent">
                <h3>Electrical Energy Alerts</h3>
                <div ng-repeat = "alert in electric_alerts">
                    <p>There was a <%alert.alert_type%> in electrical energy on week <%alert.week_number%> 
                        with a discrepancy of <%alert.discrepancy%> kWh</p>
                </div>
            </div>

            <div id="volume" class="tabcontent">
                <h3>Volume of Irrigation Water Alerts</h3>
                <div ng-repeat = "alert in volume_alerts">
                    <p>There was a <%alert.alert_type%> in volume of irrigation water on week <%alert.week_number%> 
                        with a discrepancy of <%alert.discrepancy%> Ha-m</p>
                </div>
            </div>
            <div id="soil" class="tabcontent">
                <h3>Soil Reaction pH Alerts</h3>
                <div ng-repeat = "alert in soil_alerts">
                    <p>There was a <%alert.alert_type%> in pH on week <%alert.week_number%> 
                        with a discrepancy of <%alert.discrepancy%></p>
                </div>
            </div>

            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
            </script>

        </main>
    </body>
</html>
