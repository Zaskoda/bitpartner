@extends('layouts.app')

@section('content')
<div class="col-md-8 col-lg-6">
    {!! Form::model($user, ['route' => ['users.update', $user],'method' => 'PUT','class' => 'form-horizontal']) !!}
 
    @include('_user-form-fields')
    
    <div class="form-group">
        {{ Form::submit('Update!') }}
    </div>

    {!! Form::token() !!}

    {!! Form::close() !!}
</div>
@endsection