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
        </main>
    </body>
</html>
