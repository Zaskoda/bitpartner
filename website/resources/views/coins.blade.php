@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Genesis Date</th>
                <th>Name</th>
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
                <td><span class="badge"> {{ $coin->symbol }} </span> <b>{{ $coin->name }}</b> </td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}</td>
                <td>{{ $coin->creator }}</td>
                <td>{{ $coin->summary }}</td>
                <td>
                    <div class="btn-group">
                        @if($coin->website)<a class="btn btn-default btn-xs" href="{{ $coin->website }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>@endif
                        @if($coin->source)<a class="btn btn-default btn-xs" href="{{ $coin->source }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>@endif
                        @if($coin->paper)<a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a>@endif
                        @if($coin->twitter)<a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>@endif
                        <a class="btn btn-info btn-xs" href="/coins/{{ $coin->id }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
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