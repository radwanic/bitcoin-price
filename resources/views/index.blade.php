<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{('/css/style.css')}}" rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Bitcoin Price
                </div>

                <div style="width: 40%; float: left;"><input type="text" id="from"></div>
                <div style="width: 40%; float: left;"><input type="text" id="to"></div>
                <div style="width: 20%; float: left;"><input type="button" value="Render" onclick="render()"></div>

                <div>
                    <canvas id="bitcoin-prices-chart"></canvas >
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <script>
            $('#from').datepicker();
            $('#to').datepicker();

            function render() {
                var ctx = document.getElementById('bitcoin-prices-chart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [0, 10, 5, 2, 20, 30, 45]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            }
        </script>
    </body>
</html>
