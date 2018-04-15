@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/sensors/"><i class="fa fa-sticky-note fa-fw"></i> Sensors</a></li>
<li><a href="/admin/sensors/create/"><span class="fa fa-fw fa-plus"></span> Add New Sensor</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['sensors.store'],'method' => 'POST']) !!}
                    
                    @include('admin._sensor-form-fields')
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/sensors/" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Create Sensor!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection