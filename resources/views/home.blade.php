@extends('layouts.app')

@section('content')
<div class="container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($sensors as $sensor)
                    <div class="row">
                        <div class="btn-group btn-group-justified" style="margin-bottom: 0.5em;">
                            <a href="/sensors/{{ $sensor->id }}" class="btn btn-justified btn-primary">
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
                                    <div class="col-sm-6 text-left">
                                    @if($lastreading = $sensor->lastReading())
                                        <small>Last reading on <b>{{ Carbon\Carbon::parse($lastreading->timestamp)->format('M d @ H:i') }}</b> 
                                              reported <b>{{ round($lastreading->temperature,1) }}c</b> 
                                              and <b>{{ round($lastreading->lux,1) }}</b> lumens</small>
                                    @else
                                        <small>No readings found for this sensor.</small>
                               
                                    @endif
                                    </div>                                    
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

</div>
@endsection
