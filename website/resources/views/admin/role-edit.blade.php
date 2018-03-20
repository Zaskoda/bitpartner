@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/roles/"><i class="fa fa-fw fa-address-card"></i> Roles</a></li>
<li><a href="/admin/roles/{{$role->id}}/edit"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit Role {{$role->name}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($role, ['route' => ['roles.update', $role],'method' => 'PUT']) !!}
                
                    <div class="form-group">
                        <label for="name" class="col-2-sm control-label">Role Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('name', null, ['placeholder'=>'role', 'class'=>'form-control']) }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/roles/" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Update!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>


                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection