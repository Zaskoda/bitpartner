@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['users.update', $user],'method' => 'PUT','class' => 'form-horizontal']) !!}
                
                    @include('_user-form-fields')
                    
                    <div class="form-group">
                        {{ Form::submit('Update!') }}
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection