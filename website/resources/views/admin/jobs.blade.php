@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/blockchain-jobs">Jobs</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>Post Date</th>
                <th>Name</th>
                <th>Company</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/blockchain-jobs/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Job</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>
                    <a class="btn btn-default btn-xs btn-primary" href="/blockchain-jobs/{{ $job->id }}"><i class="fa fa-fw fa-eye"></i> View</a>
                </td>
                <td>
                    {{ $job->post_date }}
                </td>
                <td>
                    {{ $job->title }}
                </td>
                <td>
                    {{ $job->company }}
                </td>
                <td class="text-right">
                    <a href="/admin/blockchain-jobs/{{ $job->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/blockchain-jobs/'.$job->id.'/'), 
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