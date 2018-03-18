@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/coins">Coins</a></li>
@endsection

@section('content')
<div class="text-center">{{ $coins->links() }}</div>
            
<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th colspan="2" class="text-right">Name</th>
            <th colspan="2" class="text-right">Created</th>
            <th colspan="3" class="text-right"><a href="/admin/coins/create" class="btn btn-success btn-xs"><span class="fa fa-fw fa-plus"></span> Add New Coin</a></th>
        </tr>
    </thead>
    <tbody>
@foreach ($coins as $coin)
    <tr>
        <td>
            <a class="btn btn-default btn-xs btn-primary" href="/coins/@if(empty($coin->slug)){{$coin->id}}@else{{$coin->slug}}@endif"><i class="fa fa-fw fa-eye"></i> View</a>
        </td>
        <td class="text-right"><span class="badge"><small> {{ $coin->symbol }} </small> </span></td>
        <td class=""><b>{{ $coin->name }}</b> </td>
        <td class="text-right">@if($coin->genesis_date){{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}@endif</td>
        <td class="">{{ $coin->creator }}</td>
        <td class="text-right">
            <a href="/admin/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
        </td>
        <td class="text-right">
            {!! Form::open(['url' => url('/admin/coins/'.$coin->id.'/'), 
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


<div class="text-center">{{ $coins->links() }}</div>

@endsection