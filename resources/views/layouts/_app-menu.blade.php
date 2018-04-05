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
                    <div style="min-width: 3em">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/img/bitpartner.png" style="height: 2.5em; margin-top: -10px" class="pull-left" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                                <li><a href="/articles">Articles</a></li>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Resource Lists <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/coins">Cryptocurrency Coins</a></li>
                                <li><a href="/decentralized-exchanges">Decentralized Exchanges</a></li>   
                                <li><a href="/blockchain-jobs">Blockchain Jobs</a></li>
                                <li><a href="/blockchain-platforms">Blockchain Platforms</a></li>                        
                                <li><a href="/icos">Initial Coin Offerings</a></li>                     
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                RPI Mine Monitor <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li><a href="/rpi-mine-monitor-how-to">How To Build</a></li>
                            <li><a href="/monitor">Raw Feed (2 min interval)</a></li>
                            <li><a href="/monitor/hourly">Hourly Average</a></li>
                            <li><a href="/monitor/daily">Daily Average</a></li>
                            </ul>
                        </li>

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
                                @role('sysop|admin')
                                    <li><a href="/admin/">Admin</a>
                                    </li>
                                @endrole
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
