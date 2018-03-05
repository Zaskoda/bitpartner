@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Symbol</th>
                <th>Genesis Date</th>
                <th>Creator</th>
                <th>Summary</th>
                <th>Links</th>
                @auth
                <th class="text-right"><a href="/coins/create" class="btn btn-xs btn-success">new</a></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($coins as $coin)
            <tr class='clickable-row' onclick="window.location = '/coins/{{ $coin->id }}'" style=" cursor: pointer; ">
                <td class="text-right">
                    @if($coin->logo) <img src="{{ $coin->logo }}" style="height: 1em"> @endif
                </td>
                <td>
                    <b>{{ $coin->name }}</b> 
                </td>
                <td>
                <span class="badge"> {{ $coin->symbol }} </span> 
                </td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}</td>
                <td>{{ $coin->creator }}</td>
                <td>{{ $coin->summary }}</td>
                <td>
                    <div class="btn-group">

                        @if($coin->website)<a class="btn btn-default btn-xs" href="{{ $coin->website }}"><i class="fa fa-fw fa-home"></i></a>@endif
                        @if($coin->source)<a class="btn btn-default btn-xs" href="{{ $coin->source }}"><i class="fa fa-fw fa-github-alt"></i></a>@endif
                        @if($coin->paper)<a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><i class="fa fa-fw fa-file"></i></a>@endif
                        @if($coin->twitter)<a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><i class="fa fa-fw fa-twitter"></i></a>@endif
                        @if($coin->reddit)<a class="btn btn-default btn-xs" href="{{ $coin->reddit }}"><i class="fa fa-fw fa-reddit"></i></a>@endif
                        @if($coin->wikipedia)<a class="btn btn-default btn-xs" href="{{ $coin->wikipedia }}"><i class="fa fa-fw fa-wikipedia-w"></i></a>@endif
                        @if($coin->docs)<a class="btn btn-default btn-xs" href="{{ $coin->docs }}"><i class="fa fa-fw fa-book"></i></a>@endif
                        <a class="btn btn-default btn-xs" href="/coins/{{ $coin->id }}"><i class="fa fa-fw fa-eye"></i></a>
                    </div>
                </td>
                @auth
                <td class="text-right"><a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection