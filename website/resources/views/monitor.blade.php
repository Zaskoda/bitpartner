@extends('layouts.app')

@section('content')
    <div class="text-center">
        <a class="btn btn-default" href="/monitor">all</a>
        <a class="btn btn-default" href="/hourly">hourly</a>
        <a class="btn btn-default" href="/daily">daily</a>
    </div>
    <div class="text-center">
    {{ $readings->links() }}
    </div>

    <line-chart :data="{@foreach ($readings as $reading) '{{ $reading->timestamp }}': {{ $reading->tempInF() }},  @endforeach}"></line-chart>


    <table class="table">
        <thead>
            <tr>
                <th>Reporter</th>
                <th>Time</th>
                <th>Temperature</th>
                <th>Pressure</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
        @foreach($readings as $reading)
            <tr>
                <td>{{ $reading->reporter }}</td>
                <td>{{ Carbon\Carbon::parse($reading->timestamp)->format('m-d H:i') }}</td>
                <td style="background-color: rgb({{ round($reading->temperature * 2 + 20) }},64,64); color:#fff;" class="text-center">{{ round($reading->temperature,2) }} C
                    /
                    {{ $reading->tempInF() }} F</td>
                <td>{{ $reading->pressure }}</td>
                <td style="background-color: rgb({{ $reading->rgb }})" class="text-center">{{ $reading->lux }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection