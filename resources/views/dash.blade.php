@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    

    <h2>My Sensors</h2>

    <div class="row">
    @foreach($sensors as $sensor)
        <div class="col-sm-4 col-md-3 col-lg-3">
            <div class="btn-group btn-group-justified" style="margin-bottom: 0.5em; padding: 0.5em;">
                <a href="/dash/sensors/{{ $sensor->id }}" class="btn btn-justified btn-default">
                    <div class=" text-center">
                        <span class="badge" style="font-size: 1.25em">  - <i class="fa fa-fw fa-thermometer"></i>  {{ $sensor->name }} - </span>
                        <p>
                            
                        </p>
                    </div>
                    <hr>
                    <div class=" text-left">
                        <div id="{{ $sensor->id }}-reading">
                            @if($lastreading = $sensor->lastReading())
                                <div class="pull-right text-center" style="border-radius: 5px; color: #fff; text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000; border: 2px solid #000; padding: 0.60em;background: rgb({{ $lastreading->red }},{{ $lastreading->green }},{{ $lastreading->blue }});">                               
                                    <b>{{ round($lastreading->lux,1) }}</b>
                                </div>
                                <div  style="font-size: 1.5em"><b>{{ round($lastreading->temperature,1) }}c/</b>{{ round($lastreading->tempInF(),1) }}f</div>
                                <small>
                                <div>{{ $lastreading->timeSince() }} ago</div>
                                <div>{{ Carbon\Carbon::parse($lastreading->timestamp)->format('M d @ H:i') }} </div>
                                </small>
                            @else
                                <small>No readings found for this sensor.</small>
                            @endif
                        </div>
                    </div>                                    
                    <hr>
                    <div class=" text-center">
                    <small>sensor id</small> #{{ $sensor->id }} <small>with</small> {{ number_format($sensor->readings->count()) }} <small>readings:</small>
                        
                    </div>
                </a>
            </div>
        </div>
    @endforeach
    </div>

    <div class="row">
        <div class="col-sm-6">
            @if($sensors->count() < 5)
            {!! Form::open(['url' => ['/dash/sensors'],'method' => 'POST','class' => 'form-inline pull-right']) !!}
            {{ Form::text('name', null, ['placeholder'=>'Enter new sensor name...', 'class'=>'form-control']) }}
            {{ Form::submit('Create A New Sensor!',['class'=>'form-control btn btn-success']) }}
            {!! Form::token() !!}
            {!! Form::close() !!}
            @else
            @endif
    
        </div>
        <div class="col-sm-6 text-right">
            <a href="" class="btn btn-info">My Profile</a>
            <a href="" class="btn btn-info">Change Password</a>
        </div>
    </div>


</div>
@endsection
