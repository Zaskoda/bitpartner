@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/roles/">Roles</a></li>
<li><a href="/admin/roles/create/">Add New Role</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['roles.store'],'method' => 'POST']) !!}
                    
                    <div class="form-group">
                        <label for="name" class="col-2-sm control-label">Role Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('name', null, ['placeholder'=>'role...', 'class'=>'form-control']) }}
                        </div>
                    </div>

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