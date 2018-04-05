@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/images/"><i class="fa fa-briefcase fa-fw"></i> Images</a></li>
<li><a href="/admin/images/create/"><span class="fa fa-fw fa-plus"></span> Add New Image</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['images.store'],'method' => 'POST']) !!}
                    
                    <image-uploader>
                                            
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/images/" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Create Image!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection