@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
        @role('sysop|admin')
            <a href="/admin/decentralized-exchanges/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
        @endrole        
            <p class="text-center"><b>Last Updated:</b> {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}
            </p>
            <p class="text-center">
        </div>
        <div class="panel-body">
            <div class="text-center">{{ $exchanges->links() }}</div>

            <div class="row">
                @foreach ($exchanges as $exchange)
                    <div class="col-xs-4 col-sm-3">
                        <div style="min-height:10em">
                            <a href="{{ $exchange->link }}" class="btn btn-primary btn-block">{{ $exchange->name }}</a>
                            <div class="well">
                            @role('sysop|admin')
                                <a href="/admin/decentralized-exchanges/{{$exchange->id}}/edit" class="btn btn-xs btn-info pull-right"><i class="fa fa-fw fa-pencil"></i></a></td>
                            @endrole
                            {{ $exchange->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="text-center">{{ $exchanges->links() }}</div>
        </div>
    </div>

@endsection