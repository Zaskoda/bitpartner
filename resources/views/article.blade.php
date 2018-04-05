@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        @role('sysop|admin')
                        <div class="pull-right"> <a href="/articles/{{ $article->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                        @endrole
                        {{ $article->title }} <span class="badge">{{ \Carbon\Carbon::createFromFormat('Y-m-d',$article->publish_date)->toFormattedDateString() }}</span>
                    </h2>
                    <p>Author: @if($article->author) {{ $article->author->name }} @endif</p>
                    <p><i>{{ $article->summary }}</i></p>
                    <div class="well">
                        {!! \Markdown::convertToHtml($article->body) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection