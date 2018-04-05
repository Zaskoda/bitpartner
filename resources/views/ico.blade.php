@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                @role('sysop|admin')
                    <div class="pull-right"> <a href="/admin/icos/{{ $ico->id }}/edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> </div>
                    @endrole
                    <h2>
                        {{ $ico->title }} 
                    </h2>
                </div>
                <div class="panel-body">
                <a href="{{ $ico->link }}" class="pull-right btn btn-default">Visit <i class="fa fa-fw fa-arrow-right"></i></a>
                    <p>
                        Dates: From {{ $ico->start_date }} until {{ $ico->end_date }}
                    </p>
                    <p>Company: {{ $ico->company }}</p>
                    <div class="well">
                        {!! \Markdown::convertToHtml($ico->description) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection