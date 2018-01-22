<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bit Partner</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <!-- Styles -->
        <style>
            html, body {
            }

            .content {
                margin: 10px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Color</th>
                            <th>Time</th>
                            <th>Temperature</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($readings as $reading)
                        <tr>
                            <td style="background-color: rgb({{ $reading->rgb }})">{{ $reading->lux }}</td>
                            <td>{{ Carbon\Carbon::parse($reading->timestamp)->format('m-d H:i') }}</td>
                            <td>{{ round($reading->temperature,2) }} C
                                /
                                {{ $reading->tempInF() }} F</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
