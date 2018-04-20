@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <div class="text-center">
                <a class="btn btn-default" href="/monitor">all</a>
                <a class="btn btn-default active" href="/monitor/hourly">hourly</a>
                <a class="btn btn-default" href="/monitor/daily">daily</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="text-center">
            {{ $readings->links() }}
            </div>

            <line-chart :data="{@foreach ($readings->reverse() as $reading) '{{ Carbon\Carbon::parse($reading->datestamp)->format('m-d') }} {{ $reading->hourstamp }}:00': {{ $reading->tempInF() }},  @endforeach}"></line-chart>

            <table class="table">
                <thead>
                    <tr>
                        <th>Sensor</th>
                        <th>Date</th>
                        <th>Temperature</th>
                        <th>Pressure</th>
                        <th>Lux</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($readings as $reading)
                    <tr>
                        <td>@if($reading->sensor)<a href="?sensor={{ $reading->sensor->id }}">{{ $reading->sensor->name }}</a>@else{{ $reading->sensor_id }}@endif</td>
                        <td>{{ Carbon\Carbon::parse($reading->datestamp)->format('m-d') }} : {{ $reading->hourstamp }}</td>
                        <td style="background-color: rgb({{ round($reading->temperature * 4) }},64,{{ max(0,round(160-$reading->temperature*4)) }}); color: #fff" class="text-center">{{ round($reading->temperature,2) }} C
                            /
                            {{ $reading->tempInF() }} F</td>
                        <td>{{ $reading->pressure }}</td>
                        <td style="">{{ $reading->lux }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection