@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th>Genesis Date</th>
                <th>Website</th>
                <th>Source</th>
                <th>Description</th>
                @auth
                <th><a href="/coins/create" class="btn btn-xs btn-success">new</a></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($coins as $coin)
            <tr>
                <td>{{ $coin->name }} <span class="badge"> {{ $coin->symbol }} </span> </td>
                <td>{{ $coin->forked_from }}</td>
                <td>{{ $coin->genesis_date }}</td>
                <td><a href="{{ $coin->website }}">{{ $coin->website }}</a></td>
                <td><a href="{{ $coin->source }}">{{ $coin->source }}</a></td>
                <td>{{ $coin->description }}</td>
                @auth
                <td><a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info">edit</a></td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection