<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:image" content="/img/partner.png">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="272">



    <title>Admin</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div style="min-width: 10em">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/img/bitpartner.png" style="height: 2.5em; margin-top: -10px" class="pull-left" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="/">Back</a></li>
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-lg-2">
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin/"><span class="fa fa-table fa-fw"></span> Dash</a></li>
                                <li class="{{ Request::is('admin/coins*') ? 'active' : '' }}"><a href="/admin/coins/" ><span class="fa fa-bitcoin fa-fw"></span> Coins</a></li>

                                <li class="{{ Request::is('blockchain-jobs') ? ' active' : '' }}"><a href="/admin/blockchain-jobs/"><span class="fa fa-briefcase fa-fw"></span> Jobs</a></li>
                                <li class="{{ Request::is('icos') ? ' active' : '' }}"><a href="/admin/icos/"><span class="fa fa-calendar fa-fw"></span> ICOs</a></li>
                                <li class="{{ Request::is('blockchain-platforms') ? ' active' : '' }}"><a href="/admin/blockchain-platforms/"><span class="fa fa-cloud fa-fw"></span> Platforms</a></li>
                                <li class="{{ Request::is('decentralized-exchanges') ? ' active' : '' }}"><a href="/admin/decentralized-exchanges/"><span class="fa fa-exchange fa-fw"></span> Exchanges</a></li>

                                @role('sysop')
                                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="/admin/users/"><span class="fa fa-fw fa-users"></span> Users</a></li>
                                <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="/admin/roles/"><span class="fa fa-fw fa-address-card"></span> Roles</a></li>                    
                                @endrole
                                <li class="warning"><a href="/"><span class="fa fa-arrow-left fa-fw"></span> Exit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-10">
                    <div class="panel">
                       <div class="panel-body">
                            <ol class="breadcrumb">
                                <li><a href="/admin/">Dash</a></li>
                                @yield('breadcrumb')
                            </ol>
                            @include('layouts.alert')
                            @yield('content')
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>
