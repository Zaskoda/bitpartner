@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Genesis Date</th>
                <th>Homepage</th>
                <th>Forked From</th>
                <th>Sourcecode</th>
                <th>Description</th>
                @auth
                <th><a href="/coins/create" class="btn btn-xs btn-success">new</a></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($coins as $coin)
            <tr>
                <td>{{ $coin->name }}</td>
                <td>{{ $coin->genesis_date }}</td>
                <td>{{ $coin->homepage }}</td>
                <td>{{ $coin->forked_from }}</td>
                <td>{{ $coin->sourcecode }}</td>
                <td>{{ $coin->short_description }}</td>
                @auth
                <td><a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info">edit</a></td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection