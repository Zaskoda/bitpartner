@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h1>Dashboard</h1>
    
    <div class="row">
        <div class="col-sm-6">
            <a href="" class="btn btn-info">My Profile</a>
            <a href="" class="btn btn-info">Change Password</a>
        </div>
        <div class="col-sm-6">
            @if($sensors->count() < 5)
            {!! Form::open(['url' => ['/dash/sensors'],'method' => 'POST','class' => 'form-inline pull-right']) !!}
            {{ Form::text('name', null, ['placeholder'=>'Enter new sensor name...', 'class'=>'form-control']) }}
            {{ Form::submit('Create A New Sensor!',['class'=>'form-control btn btn-success']) }}
            {!! Form::token() !!}
            {!! Form::close() !!}
            @else
            You currently have the maximum of 5 sensors.
            @endif
    
        </div>
    </div>

    <h2>My Sensors</h2>

    <div class="row">
    @foreach($sensors as $sensor)
        <div class="col">
            <div class="btn-group btn-group-justified" style="margin-bottom: 0.5em;">
                <a href="/dash/sensors/{{ $sensor->id }}" class="btn btn-justified btn-default">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <span class="badge"> - <i class="fa fa-fw fa-thermometer"></i> {{ $sensor->name }} - </span>
                        </div>
                        <div class="col-sm-1 text-left">
                            <small>ID:</small> #<b>{{ $sensor->id }}</b>
                        </div>
                        <div class="col-sm-2 text-left">
                            <small>Readings:</small> <b>{{ number_format($sensor->readings->count()) }}</b>
                        </div>
                        <div class="col-sm-5 text-left">
                            <div id="{{ $sensor->id }}-reading">
                                @if($lastreading = $sensor->lastReading())
                                    <small>Last reading on <b>{{ Carbon\Carbon::parse($lastreading->timestamp)->format('M d @ H:i') }}</b> 
                                        reported <b>{{ round($lastreading->temperature,1) }}c</b> 
                                        and <b>{{ round($lastreading->lux,1) }}</b> lumens</small>
                                @else
                                    <small>No readings found for this sensor.</small>
                                @endif
                            </div>
                        </div>                                    
                    </div>
                </a>
            </div>
        </div>
    @endforeach
    </div>

</div>
@endsection
