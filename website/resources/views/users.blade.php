@extends('layouts.app')

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>
                    <a href="/users/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <b>{{ $user->name }}</b> 
                </td>
                <td>
                    <b>{{ $user->email }}</b> 
                </td>
                <td>
                    @foreach($user->roles as $role)
                    {{ @$role->name }}
                    @endforeach
                </td>
                <td>
                    <div class="btn-group">
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-xs btn-default"><i class="fa fa-fw fa-pencil"></i></a></td>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection