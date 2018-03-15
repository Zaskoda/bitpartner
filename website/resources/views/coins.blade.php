@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <p class="text-center"><b>Last Updated:</b> {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}<br>
               <b>Total Coins Listed:</b> {{ $coins->count() }}  
            </p>
            <p class="text-center">The following list constains cryptocurrency coins which are open source and (mostly) decentralized. 
            This list is a work-in-progress and is update irregularly as I learn about and collect information on new coins.</p>
        </div>
        <div class="panel-body">

            @foreach ($coins as $coin)
                <div class="row">
                    <div class="col-xs-5 col-sm-1 text-right">
                        @if($coin->logo) <a href="{{ $coin->logo }}"><img src="{{ $coin->logo }}" style="height: 2.5em"></a> @endif
                    </div>

                    <div class="col-xs-7 col-sm-2">
                        <b>{{ $coin->name }}</b> 
                        <br>
                        <span class="badge"><small> {{ $coin->symbol }} </small> </span>
                    </div>
                    <div class="col-sm-2">
                        @if($coin->genesis_date){{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}@endif
                        <br>
                        {{ $coin->creator }}
                    </div>
                    <div class="col-xs-8 col-sm-5">
                        <div class="btn-group">
                            @if($coin->website)<a class="btn btn-default btn-xs" href="{{ $coin->website }}"><i class="fa fa-fw fa-home"></i></a>@endif
                            @if($coin->source)<a class="btn btn-default btn-xs" href="{{ $coin->source }}"><i class="fa fa-fw fa-github-alt"></i></a>@endif
                            @if($coin->paper)<a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><i class="fa fa-fw fa-file"></i></a>@endif
                            @if($coin->twitter)<a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><i class="fa fa-fw fa-twitter"></i></a>@endif
                            @if($coin->reddit)<a class="btn btn-default btn-xs" href="{{ $coin->reddit }}"><i class="fa fa-fw fa-reddit"></i></a>@endif
                            @if($coin->wikipedia)<a class="btn btn-default btn-xs" href="{{ $coin->wikipedia }}"><i class="fa fa-fw fa-wikipedia-w"></i></a>@endif
                            @if($coin->docs)<a class="btn btn-default btn-xs" href="{{ $coin->docs }}"><i class="fa fa-fw fa-book"></i></a>@endif
                        </div>
                        <div style="margin-top: 6px;">
                        {{ $coin->summary }} 
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-2 text-center">
                        <div class="">
                            <a class="btn btn-default btn-xs btn-primary" href="/coins/{{ $coin->id }}"><i class="fa fa-fw fa-eye"></i> Details</a>
                            @role('sysop')
                            <a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a></td>
                            @endrole
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

@endsection