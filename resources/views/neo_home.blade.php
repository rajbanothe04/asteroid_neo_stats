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
    <div class="container mt-4 card p-3 bg-white" style="width: 800px">
        <h3><center>Select Dates To Get Astroid</center></h3>

        <form method="post" action="{{ route('getneodata') }}">
            <div class="row mt-2">
                @csrf

                <div class="form-group col-md-6 required">
                    <label for="fromDate">From Date:<span style="color:#ff0000"> *</span></label>
                    <input type="text" name="fromDate" width="50%" id="fromDate" value="" class="form-control" aria-describedby="helpId">

                </div>
                <div class="form-group col-md-6 required">
                    <label for="toDate">To Date:<span style="color:#ff0000"> *</span></label>
                    <input type="text" name="toDate" id="toDate" width="50%" value="" class="form-control" aria-describedby="helpId">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <button class="btn btn-primary form-control" value="Submit" name="Submit"
                        id="search">Submit</button>
                </div>
            </div>
        </form>
    </div>
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
