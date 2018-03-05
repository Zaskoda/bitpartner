@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <h2>
                @role('sysop')
                <div class="pull-right"> <a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                @endrole
                {{ $coin->name }} <span class="badge">{{ $coin->symbol }}</span>
            </h2>


            <div style="height: 4em; width: 4em; overflow: hidden;" class="text-center pull-right">
                @if($coin->logo) 
                    <img src="{{ $coin->logo }}" style="max-height: 100%; max-width: 100%">
                @endif
            </div>
            <p>Genesis::<br> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}</p>
            <p>Author:<br> {{ $coin->creator }}</p>
            <p><i>{{ $coin->summary }}</i></p>
            <p class="well">{{ $coin->description }}
            </p>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-default btn-xs" href="{{ $coin->website }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><br>Website</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->source }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Source</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span><br>Paper</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><br>Twitter</a>
            </div>
            <div>{{ $coin->forked_from }}</div>

        </div>
    </div>
@endsection