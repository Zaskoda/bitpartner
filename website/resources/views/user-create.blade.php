@extends('layouts.app')

@section('content')
<div class="col-md-8 col-lg-6">
    {!! Form::open(['route' => ['users.store'],'method' => 'POST']) !!}

    @include('_user-form-fields')
    
    <div class="form-group">
        <label for="password" class="col-2-sm control-label">Password</label>
        <div class="col-10-sm">
        {{ Form::text('password', null, ['placeholder'=>'ChangeMe12...', 'class'=>'form-control']) }}
        </div>
    </div>

    <div class="form-group">
     {{ Form::submit('Create!',['class'=>'form-control']) }}
    </div>

    {!! Form::token() !!}

    {!! Form::close() !!}
</div>

@endsection