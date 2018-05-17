@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/sensors"><i class="fa fa-sticky-note fa-fw"></i> Sensors</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>id</th>
                <th>Name</th>
                <th>Readings</th>
                <th>API Token</th>
                <th>User</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/sensors/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Sensor</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensors as $sensor)
            <tr>
                <td>
                    <a class="btn btn-default btn-xs btn-primary" href="/sensors/{{ $sensor->id }}"><i class="fa fa-fw fa-eye"></i> View</a>
                </td>
                <td>
                    {{ $sensor->id }}
                </td>
                <td>
                    {{ $sensor->name }}
                </td>
                <td>
                    {{ $sensor->readings->count() }}
                </td>
                <td>
                    <a href="/admin/sensors/{{ $sensor->id }}/refresh-token" onclick="return confirm('Generate New API Token?')" class="btn btn-xs btn-info pull-right"><i class="fa fa-fw fa-1x fa-key"></i><i class="fa fa-fw fa-1x fa-refresh"></i></a>
                    {{ $sensor->api_token }}
                </td>
                <td>
                    @if($sensor->user_id) <a href="/admin/users/{{ $sensor->user_id }}/edit/">{{ $sensor->user_id }}:{{ $sensor->user->name }}</a> @else not set @endif
                </td>
                <td>
                    {{ $sensor->summary }}
                </td>
                <td class="text-right">
                    <a href="/admin/sensors/{{ $sensor->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/sensors/'.$sensor->id.'/'), 
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