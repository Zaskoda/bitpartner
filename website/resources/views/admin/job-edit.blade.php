@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/blockchain-jobs/"><i class="fa fa-briefcase fa-fw"></i> Jobs</a></li>
<li><a href="/admin/blockchain-jobs/{{$job->id}}/edit"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit Job {{$job->name}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($job, ['route' => ['blockchain-jobs.update', $job],'method' => 'PUT']) !!}
                
                    @include('admin._job-form-fields')

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/blockchain-jobs" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Update!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>



                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection