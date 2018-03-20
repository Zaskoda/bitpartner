@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        @role('sysop|admin')
                        <div class="pull-right"> <a href="/admin/pages/{{ $page->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                        @endrole
                        {{ $page->title }} 
                    </h2>
                    <hr>
                    <div>
                        {!! \Markdown::convertToHtml($page->body) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection