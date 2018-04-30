@extends('layouts.app')

@section('content')

    @role('sysop|admin')
        <a href="/admin/blockchain-jobs/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
    @endrole        
    <h1>Blockchain (and related...) Jobs <span class="badge">Last updated: {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}</span></h1>
    <div class="text-center">{{ $jobs->links() }}</div>
                @foreach ($jobs as $job)
                <div class="row">

                        <div class="btn-group btn-group-justified" style="margin-bottom: 0.5em;">
                            <a href="/blockchain-jobs/{{ $job->id }}" class="btn btn-justified btn-default">
                                <div class="row">
                                    <div class="col-sm-2 text-left">
                                    <i class="fa fa-fw fa-briefcase"></i><small> {{ \Carbon\Carbon::parse($job->post_date)->toFormattedDateString() }}</small>
                                    </div>

                                    <div class="col-sm-5 text-left">
                                         <small>{{ $job->title }}</small>
                                    </div>

                                    <div class="col-sm-5 text-right">
                                        <small>{{ $job->company }}, {{ $job->location }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>

            </div>

                @endforeach
    
            <div class="text-center">{{ $jobs->links() }}</div>
        </div>
    </div>

@endsection