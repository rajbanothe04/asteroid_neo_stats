<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container mt-4 card p-3 bg-white" style="width: 1000px">
        <h3>
            <center>Select Dates To Get Astroid</center>
        </h3>

        <form method="post" action="{{ route('getneodata') }}">
            <div class="row mt-2">
                @csrf
                
                <div class="form-group col-md-6 required">
                    <label for="fromDate">From Date:<span style="color:#ff0000"> *</span></label>
                    <input type="text" name="fromDate" width="50%" id="fromDate"
                        value="{{ old('fromDate', $datedata['fromdate']) }}" class="form-control"
                        aria-describedby="helpId">

                </div>
                <div class="form-group col-md-6 required">
                    <label for="toDate">To Date:<span style="color:#ff0000"> *</span></label>
                    <input type="text" name="toDate" id="toDate" width="50%"
                        value="{{ old('toDate', $datedata['todate']) }}" class="form-control"
                        aria-describedby="helpId">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <button class="btn btn-primary form-control" value="Submit" name="Submit" id="search">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

    <br><br>
    <div class="container card p-3 bg-white" style="width: 1000px">
        <div class="row">
            <div class="col-md-6 required">
                <h4><b>Fastest Asteroid:</b><br>Asteroid ID is {{ $fastestAseroidId }}<br>Speed in KM/H = {{$fastestAseroid }}</h4><br>
               <h4><b>Closest Asteroid:</b><br>Asteroid ID is {{ $closestAseroidId }}<br>Distance = {{$closestAseroid }} </h4><br>
               <h4><b>Average Size of the Asteroids:</b><br> In kilometers =</b>{{$average}} </h4>
            </div>
            <div class="col-md-6 required">
                <div style="width: 450px;height: 450px;">
                    <canvas id="myChart" width="350" height="250" style="border: solid;color: black;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script>
        var noOfAstroids = <?php echo json_encode($neo_count_by_date_arry_values); ?>;
        var astroidsAppeardate = <?php echo json_encode($neo_count_by_date_arry_keys); ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: astroidsAppeardate,
                datasets: [{
                    label: '# of Asteroids',
                    data: noOfAstroids,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
            });
            $("#fromDate").datepicker();
            $("#toDate").datepicker();
        });
    </script>
</body>

</html>
