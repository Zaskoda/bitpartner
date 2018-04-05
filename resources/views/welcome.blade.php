@extends('layouts.app')

@section('content')

            <div  style="margin: 4em; max-height: 60%;" class="text-center">
                <img src="img/bit-partner-words.png" style="max-width: 100%;" alt="BitPartner" title="BitPartner">
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <p style="padding: 1em">
                        Howdy there, Bit Partner. Pardon our dust while I round up
                        a pile-o-data for your reference pleasure. We currently have
                        a growing list of <a href="/coins">cryptocurrency coins</a> complete
                        with lots of links for each. We also just launched lists for
                        <a href="/decentralized-exchanges">decentralized exchanges</a>,
                        blockchain 
                        <a href="/blockchain-jobs">jobs</a> &
                        <a href="/blockchain-platforms">platforms</a>, and
                        <a href="/icos">initial coins offerings</a>.
                        Finally, you can see my prototype <a href="/monitor">mine monitor</a>
                        showing the current temperature in my own Bitcoin mine. Instructions
                        on how to build your own monitor are coming soon! 
                    </p>
                </div>
            </div>
            <div class="row">
                    <a href="/coins" class="btn btn-default col-xs-12 col-sm-4 col-md-2" alt="Learn you some cryptos..." title="Learn you some cryptos...">Cryptocurrency Coins&nbsp;List</a>
                    <a href="/decentralized-exchanges" class="btn btn-default col-xs-12 col-sm-4 col-md-2" alt="Trade your assets..." title="Trade your assets...">Decentralized Exchanges</a>
                    <a href="/blockchain-jobs" class="btn btn-default col-xs-12  col-sm-4 col-md-2" alt="Go to work..." title="Go to work...">Blockchain Jobs</a>
                    <a href="/blockchain-platforms" class="btn btn-default col-xs-12  col-sm-4 col-md-2" alt="Find a place to build..." title="Find a place to build...">Blockchain Platforms</a>
                    <a href="/icos" class="btn btn-default col-xs-12  col-sm-4 col-md-2" alt="Gamble on an IPO..." title="Gamble on an IPO...">Initial Coin Offerings</a>
                    <a href="/monitor" class="btn btn-default col-xs-12  col-sm-4 col-md-2" alt="How hot is my mine?" title="How hot is my mine?">RPI Mine Monitor</a>
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

@endsection
