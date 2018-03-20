@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/blockchain-platforms"><i class="fa fa-cloud fa-fw"></i> Platforms</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Creator</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/blockchain-platforms/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Platform</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platforms as $platform)
            <tr>
                <td>
                    {{ $platform->name }}
                </td>
                <td>
                    {{ $platform->creator }}
                </td>
                <td class="text-right">
                    <a href="/admin/blockchain-platforms/{{ $platform->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/blockchain-platforms/'.$platform->id.'/'), 
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