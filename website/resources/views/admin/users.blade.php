@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/users"><i class="fa fa-fw fa-users"></i> Users</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/users/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New User</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @foreach($user->roles as $role)
                    {{ @$role->name }}
                    @endforeach
                </td>
                <td class="text-right">
                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/users/'.$user->id.'/'), 
                                                'class'=> "pull-right", 
                                                'method'=>'delete', 
                                                'style'=>"display:inline",
                                                'onSubmit' => "if(!confirm('Are you sure?')){return false;}" ]) !!}
                                <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></button>
                    {!! Form::close()!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection