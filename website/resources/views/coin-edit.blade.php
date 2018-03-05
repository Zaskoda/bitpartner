@extends('layouts.app')

@section('content')
<div class="col-md-8 col-lg-6">
    {!! Form::model($coin, ['route' => ['coins.update', $coin],'method' => 'PUT','class' => 'form-horizontal']) !!}
 
    @include('_coin-form-fields')
    
    <div class="form-group">
        {{ Form::submit('Update!') }}
    </div>

    {!! Form::token() !!}

    {!! Form::close() !!}
</div>
@endsection