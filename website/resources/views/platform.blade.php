@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>
                        @role('sysop|admin')
                        <div class="pull-right"> <a href="/admin/blockchain-platforms/{{ $platform->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a> </div>
                        @endrole
                        {{ $platform->name }} <span class="badge">{{ $platform->creator }}</span>
                    </h2>
                    <a href="{{ $platform->link }}" class="btn btn-primary btn-block">Visit <i class="fa fa-fw fa-arrow-right"></i></a>
                    <div class="well">
                        {!! \Markdown::convertToHtml($platform->description) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection