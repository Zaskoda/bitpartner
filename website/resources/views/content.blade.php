@extends('layouts.app')

@section('content')

    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-body">
        {!! $content !!}
            </div>
        </div>
    </div>
@endsection