@extends('layouts.admin')

@section('content')
    <p class="text-center">This is the Dashboard</p>
    <p class="text-center">Total Coins: {{ $counts['coins'] }}</p>
@endsection