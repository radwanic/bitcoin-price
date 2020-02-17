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
    </link>
</head>
<body>
<div class="flex-center  full-height">
    <div class="content">
        <div class="title m-b-md">
            Bitcoin Price
        </div>

        <div class="text-danger" id="errors"></div>

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
    $('#from').datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker(
        'setDate', '-10d'
    );

    $('#to').datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker(
        'setDate', '0d'
    );

    function render() {
        let url = "/api/chartjs/line?from=" + $('#from').val() + "&to=" + $('#to').val();

        $('#errors').html('');

        $.ajax({
            url: url,
            dataType: 'json',
            async: false,
            success: function(data) {
                let el = document.getElementById('bitcoin-prices-chart');
                let chart = new Chart(el, data);
            },
            error: function (error) {
                //TODO: format errors markup
                $('#errors').html(JSON.stringify(error.responseJSON.errors));
            }
        });
    }
</script>
</body>
</html>
