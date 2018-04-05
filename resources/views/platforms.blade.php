@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
        @role('sysop|admin')
            <a href="/admin/blockchain-platforms/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
        @endrole        
            <p class="text-center"><b>Last Updated:</b> {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}
            </p>
            <p class="text-center">
        </div>
        <div class="panel-body">
            <div class="text-center">{{ $platforms->links() }}</div>

            <div class="row">
                @foreach ($platforms as $platform)
                    <div class="col-xs-6 col-sm-4">
                        <div style="min-height:8em">
                            <a href="/blockchain-platforms/{{ $platform->id }}" class="btn btn-block btn-primary">
                                <div>{{ $platform->name }}</div>
                                <div><small>{{ $platform->creator }}  {{ $platform->location }}</small></div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="text-center">{{ $platforms->links() }}</div>
        </div>
    </div>

@endsection