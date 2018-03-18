@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        @role('sysop|admin')
                        <div class="pull-right"> <a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                        @endrole
                        {{ $coin->name }} <span class="badge">{{ $coin->symbol }}</span>
                    </h2>

                    <div style="height: 8em; width: 8em; overflow: hidden;" class="text-center pull-right">
                        @if($coin->logo) 
                            <a href="{{ $coin->logo }}"><img src="{{ $coin->logo }}" style="max-height: 100%; max-width: 100%"></a>
                        @endif
                    </div>
                    <p>Genesis:<br> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}</p>
                    <p>Author:<br> {{ $coin->creator }}</p>
                    <p><i>{{ $coin->summary }}</i></p>
                    <div class="well">
                        {!! \Markdown::convertToHtml($coin->description) !!}
                    </div>
                    <div class="btn-group btn-grou-default btn-group-justified">
                        @if($coin->website)<a class="btn btn-default" href="{{ $coin->website }}"><i class="fa fa-fw fa-home"></i><br>Website</a>@endif
                            @if($coin->source)<a class="btn btn-default" href="{{ $coin->source }}"><i class="fa fa-fw fa-github-alt"></i><br>Source</a>@endif
                            @if($coin->paper)<a class="btn btn-default" href="{{ $coin->paper }}"><i class="fa fa-fw fa-file"></i><br>Paper</a>@endif
                            @if($coin->twitter)<a class="btn btn-default" href="{{ $coin->twitter }}"><i class="fa fa-fw fa-twitter"></i><br>Twitter</a>@endif
                            @if($coin->reddit)<a class="btn btn-default" href="{{ $coin->reddit }}"><i class="fa fa-fw fa-reddit"></i><br>Reddit</a>@endif
                            @if($coin->wikipedia)<a class="btn btn-default" href="{{ $coin->wikipedia }}"><i class="fa fa-fw fa-wikipedia-w"></i><br>Wikipedia</a>@endif
                            @if($coin->docs)<a class="btn btn-default" href="{{ $coin->docs }}"><i class="fa fa-fw fa-book"></i><br>Docs</a>@endif
                    </div>
                    <div>{{ $coin->forked_from }}</div>

                </div>
            </div>
        </div>
    </div>
@endsection