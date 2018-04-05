@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/articles"><i class="fa fa-sticky-note fa-fw"></i> Articles</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th></th>
                <th class="text-right">Date</th>
                <th>Title</th>
                <th>Author</th>
                <th>Summary</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/articles/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Article</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>
                    <a class="btn btn-default btn-xs btn-primary" href="/articles/{{ $article->slug }}"><i class="fa fa-fw fa-eye"></i> View</a>
                </td>
                <td class="text-right">@if($article->publish_date) {{ \Carbon\Carbon::parse($article->publish_date)->toFormattedDateString() }} @else unpublished @endif</td>
                <td>
                    {{ $article->title }}
                </td>
                <td>
                    @if($article->author) <a href="/admin/users/{{ $article->author->id }}/edit/">{{ $article->author->name }}</a> @else unknown @endif
                </td>
                <td>
                    {{ $article->summary }}
                </td>
                <td class="text-right">
                    <a href="/admin/articles/{{ $article->id }}/edit" class="btn btn-xs btn-info"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit</a>
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/articles/'.$article->id.'/'), 
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