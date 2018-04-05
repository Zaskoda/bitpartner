@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/pages"><i class="fa fa- fa-fw"></i> Static Content</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Slug</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/pages/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New StaticContent</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>
                    <a class="btn btn-default btn-xs btn-primary" href="/{{ $page->slug }}"><i class="fa fa-fw fa-eye"></i> View</a>
                </td>
                <td>
                    {{ $page->title }}
                </td>
                <td>
                    {{ $page->slug }}
                </td>
                <td class="text-right">
                    <a href="/admin/pages/{{ $page->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/pages/'.$page->id.'/'), 
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