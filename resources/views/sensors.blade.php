@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="text-center">
            {{ $sensors->links() }}
            </div>



            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>owner</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sensors as $sensor)
                    <tr>
                        <td><a href="/sensors/{{ $sensor->id }}">{{ $sensor->name }}</a></td>
                        <td>{{ $sensor->user_id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection