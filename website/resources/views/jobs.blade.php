@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
        @role('sysop|admin')
            <a href="/admin/blockchain-jobs/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
        @endrole        
            <p class="text-center"><b>Last Updated:</b> {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}
            </p>
            <p class="text-center">
        </div>
        <div class="panel-body">
            <div class="text-center">{{ $jobs->links() }}</div>

            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-xs-6 col-sm-4">
                        <div style="min-height:8em" class="well">
                            <a href="/blockchain-jobs/{{ $job->id }}" class="">
                                <div>{{ $job->title }}</div>
                                <div><small>{{ $job->company }}  {{ $job->location }}</small></div>
                                <div><small>{{ $job->post_date }}</small></div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="text-center">{{ $jobs->links() }}</div>
        </div>
    </div>

@endsection