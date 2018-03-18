@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/decentralized-exchanges">Exchanges</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/decentralized-exchanges/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Exchange</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exchanges as $exchange)
            <tr>
                <td>
                    {{ $exchange->name }}
                </td>
                <td class="text-right">
                    <a href="/admin/decentralized-exchanges/{{ $exchange->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/decentralized-exchanges/'.$exchange->id.'/'), 
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