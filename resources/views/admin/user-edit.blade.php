@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/users"><i class="fa fa-fw fa-users"></i> Users</a></li>
<li><a href="/admin/users/{{$user->id}}/edit"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit User #{{$user->id}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['users.update', $user],'method' => 'PUT']) !!}
                
                    @include('admin._user-form-fields')
                    
                    <div class="form-group">
                        <label for="newPassword" class="col-2-sm control-label">Password</label>
                        <div class="col-10-sm">
                        {{ Form::password('newPassword', null, ['placeholder'=>'xxx', 'class'=>'form-control']) }}
                        </div>
                    </div>
                    
                    @foreach($roles as $role)
                        <p>{!! 
                        Form::checkbox(
                            'roles['.$role->id.']', 
                            '1', 
                            in_array(
                                $role->name, 
                                array_pluck(
                                    $user->roles->toArray(),
                                    'name'
                        ))) 
                        !!} {{ $role->name }}</p>
                    @endforeach


    
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