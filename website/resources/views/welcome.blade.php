<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bit Partner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Share+Tech:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fec260;
                color: #000000;
                font-family: 'Share Tech', sans-serif;
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

            a {
                text-decoration: none;
                padding: 10px;
                color: #3c2925;
            }
            .button {
                font-weight: bold;
                font-size: 1.5em;
                border-radius: 10px;
                margin: 1em;
                padding: 1em;
                border: 4px solid #fff;
                background: #f2d6c2;
            }
            .button:hover {
                background: #fff;
            }
            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 0px;
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
                <div class="title m-b-md">
                    <div  style="max-width: 90%; max-height: 60%;">
                        <img src="img/bitpartner.svg" style="max-width: 95%; max-height: 95%;" alt="BitPartner" title="BitPartner">
                    </div>
                </div>
                <div class="text-center">
                        <a href="/coins" class="button" alt="Learn you some cryptos..." title="Learn you some cryptos...">Cryptocoins List</a>

                        <a href="/monitor" class="button" alt="How hot is the mine?" title="How hot is the mine?">Mine Monitor</a>
                </div>

            </div>
        </div>
    </body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115052305-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-115052305-1');
    </script>

</html>
