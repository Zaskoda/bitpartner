@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/users"><i class="fa fa-fw fa-users"></i> Users</a></li>
<li><a href="/admin/users/create"><span class="fa fa-fw fa-plus"></span> Add New User</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['users.store'],'method' => 'POST']) !!}

                    @include('admin._user-form-fields')
                    
                    <div class="form-group">
                        <label for="password" class="col-2-sm control-label">Password</label>
                        <div class="col-10-sm">
                        {{ Form::text('password', null, ['placeholder'=>'ChangeMe12...', 'class'=>'form-control']) }}
                        </div>
                    </div>


                    @foreach($roles as $role)
                        <p>{!! 
                        Form::checkbox('roles['.$role->id.']','1', false) 
                        !!} {{ $role->name }}</p>
                    @endforeach

                    <div class="form-group">
                    {{ Form::submit('Create!',['class'=>'form-control']) }}
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection