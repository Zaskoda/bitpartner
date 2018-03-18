@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th class="text-right">
                                @role('sysop|admin')
                                    <a href="/admin/icos/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i></a></td>
                                @endrole
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
                                    <a href="/icos/{{ $ico->id }}/" class="btn btn-xs btn-info"> Details <i class="fa fa-fw fa-1x fa-arrow-right"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection