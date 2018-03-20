@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-7">
            @role('sysop|admin')
                <a href="/admin/articles/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a>
            @endrole        
            <h1>The Partner Outpost</h1>

            @foreach ($articles as $article)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><a href="/articles/{{ $article->slug }}" class="">{{ $article->title }}</a></h3>
                    </div>
                    <div class="panel-body">
                                @role('sysop|admin')
                                    <a href="/admin/articles/{{$article->id}}/edit" class="btn btn-xs btn-info pull-right"><i class="fa fa-fw fa-pencil"></i></a></td>
                                @endrole
                        <p>
                        Published on: {{ \Carbon\Carbon::parse($article->publish_date)->toFormattedDateString() }}<br>
                        Written by: @if($article->user) <a href="/partners/{{ $article->user->id }}">{{ $article->user->name }}</a> @else unknown @endif
                        </p>
                        <section>
                        {{ $article->summary }}
                        </section>
                        <footer>
                        <a href="/articles/{{ $article->slug }}" class="">read more...</a>
                        </footer>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-sm-12 col-md-3 col-lg-5">
          @include('_sidebar')
        </div>
    </div>

@endsection