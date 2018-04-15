<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ \Auth::user()->api_token }}">

    <meta property="og:image" content="/img/partner.png">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="272">



    <title>Admin</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
    <div>
        @include('layouts._app-menu')

        <div class="container" id="admin">
            <div class="row">
                <div class="col-sm-3 col-lg-2">
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin/"><i class="fa fa-table fa-fw"></i> Dashboard</a></li>
                                <li class="{{ Request::is('admin/images*') ? 'active' : '' }}"><a href="/admin/images"><i class="fa fa-image fa-fw"></i> Images</a></li>
                                <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}"><a href="/admin/pages"><i class="fa fa-leanpub fa-fw"></i> Pages</a></li>
                                <li class="{{ Request::is('admin/articles*') ? 'active' : '' }}"><a href="/admin/articles"><i class="fa fa-sticky-note fa-fw"></i> Articles</a></li>
                                <li class="{{ Request::is('admin/coins*') ? 'active' : '' }}"><a href="/admin/coins/" ><i class="fa fa-bitcoin fa-fw"></i> Coins</a></li>
                                <li class="{{ Request::is('admin/decentralized-exchanges*') ? ' active' : '' }}"><a href="/admin/decentralized-exchanges/"><i class="fa fa-exchange fa-fw"></i> Exchanges</a></li>
                                <li class="{{ Request::is('admin/blockchain-jobs*') ? ' active' : '' }}"><a href="/admin/blockchain-jobs/"><i class="fa fa-briefcase fa-fw"></i> Jobs</a></li>
                                <li class="{{ Request::is('admin/blockchain-platforms*') ? ' active' : '' }}"><a href="/admin/blockchain-platforms/"><i class="fa fa-cloud fa-fw"></i>  Platforms</a></li>
                                <li class="{{ Request::is('admin/icos*') ? ' active' : '' }}"><a href="/admin/icos/"><i class="fa fa-calendar fa-fw"></i> ICOs</a></li>
                                @role('sysop')
                                <li class="{{ Request::is('admin/sensors*') ? 'active' : '' }}"><a href="/admin/sensors/"><i class="fa fa-fw fa-users"></i> Sensors</a></li>
                                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="/admin/users/"><i class="fa fa-fw fa-users"></i> Users</a></li>
                                <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="/admin/roles/"><i class="fa fa-fw fa-address-card"></i> Roles</a></li>                    
                                @endrole
                                <li class="warning"><a href="/"><i class="fa fa-arrow-left fa-fw"></i> Exit</a></li>
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
