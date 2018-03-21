@extends('layouts.app')

@section('content')

    @role('sysop|admin')
        <a href="/admin/blockchain-jobs/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
    @endrole        
    <h1>Blockchain (and related...) Jobs <span class="badge">Last updated: {{ \Carbon\Carbon::parse($last_updated)->toFormattedDateString() }}</span></h1>
    <div class="text-center">{{ $jobs->links() }}</div>

            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-xs-6 col-md-4">
                        <div style="min-height:16em" class="panel">
                            <div class="panel-body">                        
                            <div class="text-center lead"><a href="/blockchain-jobs/{{ $job->id }}">{{ $job->title }}</a></div>
                            <div class="row">
                                <div class="col-sm-4 text-right">Company:</div><div class="col-sm-8">{{ $job->company }}  </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 text-right">Location: </div><div class="col-sm-8">{{ $job->location }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 text-right">Posted: </div><div class="col-sm-8">{{ \Carbon\Carbon::parse($job->post_date)->toFormattedDateString() }}</div>
                            </div>
                                <div><a href="/blockchain-jobs/{{ $job->id }}" class="btn btn-block btn-default">read more...</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="text-center">{{ $jobs->links() }}</div>
        </div>
    </div>

@endsection