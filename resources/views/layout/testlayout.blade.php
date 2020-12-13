<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <!-- Styles -->
        <style>
            .upload-files{
                margin-top: 15%;
                margin-left: 15%;
                max-width: 60%;
            }
            .table{
                max-width: 60%;
            }
            .input{
                margin-right: 10%;
            }
            .home-btn{
                margin-top: 2%;
                margin-left: 2%;
            }
        </style>
    </head>
    <body>
    <div >
    <a href="{{ url('/') }}">
    <button class="btn btn-primary home-btn">
            Home
    </button>
    </a>
    @yield('content')
    </div>
    </body>
    <script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 3000 );
    });
    </script>
</html>
