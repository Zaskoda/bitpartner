@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-center">
                <a class="btn btn-default" href="/monitor">all</a>
                <a class="btn btn-default" href="/monitor/hourly">hourly</a>
                <a class="btn btn-default active" href="/monitor/daily">daily</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="text-center">
            {{ $readings->links() }}
            </div>


            <line-chart :data="{@foreach ($readings as $reading) '{{ $reading->datestamp }}': {{ $reading->tempInF() }},  @endforeach}"></line-chart>

            <table class="table">
                <thead>
                    <tr>
                        <th>Reporter</th>
                        <th>Date</th>
                        <th>Temperature</th>
                        <th>Pressure</th>
                        <th>Lux</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($readings as $reading)
                    <tr>
                        <td>{{ $reading->reporter }}</td>
                        <td>{{ Carbon\Carbon::parse($reading->datestamp)->format('m-d') }}</td>
                        <td style="background-color: rgb({{ round($reading->temperature * 4) }},64,{{ max(0,round(160-$reading->temperature*4)) }}); color: #fff;" class="text-center">{{ round($reading->temperature,2) }} C
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