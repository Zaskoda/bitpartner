@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        @role('sysop|admin')
                        <div class="pull-right"> <a href="/admin/blockchain-jobs/{{ $job->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                        @endrole
                        {{ $job->title }} <span class="badge">{{ $job->post_date }}</span>
                    </h2>
                    <a href="{{ $job->source }}" class="pull-right btn btn-default">Apply <i class="fa fa-fw fa-arrow-right"></i></a>
                    <p>Company: {{ $job->company }}</p>
                    <p>Location: {{ $job->location }}</p>
                    <div class="well">
                        {!! \Markdown::convertToHtml($job->description) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection