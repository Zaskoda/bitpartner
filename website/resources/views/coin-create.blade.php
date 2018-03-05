@extends('layouts.app')

@section('content')
<div class="col-md-8 col-lg-6">
    {!! Form::open(['route' => ['coins.store'],'method' => 'POST']) !!}

    @include('_coin-form-fields')
    
    <div class="form-group">
     {{ Form::submit('Create!',['class'=>'form-control']) }}
    </div>

    {!! Form::token() !!}

    {!! Form::close() !!}
</div>

@endsection