<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {background-color:#f6f6f5;}
    </style>
</head>
<body>
    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$id}}"></script>
    <form action="{{url('hyperpaysubmit')}}" class="paymentWidgets" data-brands="VISA MASTER AMEX">
        @csrf
    </form>
</body>
</html>

