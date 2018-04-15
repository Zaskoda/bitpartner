@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn-group btn-group-justified">
                    @foreach($sensors as $sensor)
                        <a href="/sensors/{{$sensor->id}}" class="btn btn-justified btn-default">
                            {{ $sensor->id }}:{{ $sensor->readings->count() }} | <b>{{ $sensor->name }}</b>
                        </a>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
