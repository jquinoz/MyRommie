<!DOCTYPE html>
<html>
    <head>
        <title>Authentication Error.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <center>
                    <a class="navbar-brand title" href="{{ url('/') }}">
                        {{ config('My Rommie', 'volver a pagina principal') }}
                    </a>
                </center>
            </div>
                <div class="title">Error de autenticación</div>
        </div>
    </body>
</html>
