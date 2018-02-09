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
                color: #000;
                background: #fff;

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



            <div class="content" id="app">
                <div class="text-center">
                    <a class="btn btn-default" href="/monitor">all</a>
                    <a class="btn btn-default" href="/hourly">hourly</a>
                    <a class="btn btn-default" href="/daily">daily</a>
                </div>
                <div class="text-center">
                {{ $readings->links() }}
                </div>

                <line-chart :data="{@foreach ($readings as $reading) '{{ $reading->timestamp }}': {{ $reading->tempInF() }},  @endforeach}"></line-chart>


                <table class="table">
                    <thead>
                        <tr>
                            <th>Reporter</th>
                            <th>Time</th>
                            <th>Temperature</th>
                            <th>Pressure</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($readings as $reading)
                        <tr>
                            <td>{{ $reading->reporter }}</td>
                            <td>{{ Carbon\Carbon::parse($reading->timestamp)->format('m-d H:i') }}</td>
                            <td style="background-color: rgb({{ round($reading->temperature * 2 + 20) }},64,64); color:#fff;" class="text-center">{{ round($reading->temperature,2) }} C
                                /
                                {{ $reading->tempInF() }} F</td>
                            <td>{{ $reading->pressure }}</td>
                            <td style="background-color: rgb({{ $reading->rgb }})" class="text-center">{{ $reading->lux }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="/js/app.js"></script> 

</html>
