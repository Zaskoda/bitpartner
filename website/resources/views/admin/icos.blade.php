@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/icos">ICOs</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/icos/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New ICO</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($icos as $ico)
            <tr>
                <td>
                    {{ $ico->title }}
                </td>
                <td>
                    {{ $ico->start_date }}
                </td>
                <td>
                    {{ $ico->end_date }}
                </td>
                <td class="text-right">
                    <a href="/admin/icos/{{ $ico->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/icos/'.$ico->id.'/'), 
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