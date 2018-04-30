@extends('layouts.app')

@section('content')
        <rico v-bind:sensor-id="{{ $sensor->id }}">
        </rico>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $sensor->name }}
        </div>


        <div class="panel-body">
            <div class="text-center">
            {{ $sensor->readings()->orderBy('id','desc')->paginate(20)->links() }}
            </div>
            <div class="text-center">
            {{ $sensor->readings()->count() }} readings
            </div>

            <line-chart :data="{@foreach ($sensor->readings()->orderBy('id','desc')->paginate(200) as $reading) '{{ $reading->timestamp }}': {{ $reading->tempInF() }},  @endforeach}"></line-chart>


            <table class="table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>                        
                        <th>Altitude</th>
                        <th>Pressure</th>
                        <th>Lux</th>
                        <th>Heading</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sensor->readings()->orderBy('id','desc')->paginate(200) as $reading)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($reading->timestamp)->format('m-d H:i') }}</td>
                        <td style="background-color: rgb({{ round($reading->temperature * 4) }},64,{{ max(0,round(160-$reading->temperature*4)) }}); color: #fff" class="text-center">{{ round($reading->temperature,2) }} C
                            /
                            {{ $reading->tempInF() }} F</td>
                        <td>{{ $reading->altitude }}</td>
                        <td>{{ $reading->pressure }}</td>
                        <td style="background-color: rgb({{$reading->red}},{{$reading->green}},{{$reading->blue}})" class="text-center">{{ $reading->lux }}</td>
                        <td>{{ $reading->heading }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection