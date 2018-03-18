@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/blockchain-jobs/">Jobs</a></li>
<li><a href="/admin/blockchain-jobs/create/">Add New Job</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['blockchain-jobs.store'],'method' => 'POST']) !!}
                    
                    @include('admin._job-form-fields')
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/blockchain-jobs/" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Create Job!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection