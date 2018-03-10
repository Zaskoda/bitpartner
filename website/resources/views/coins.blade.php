@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-body">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="3%"></th>
                        <th width="4%" class="text-right">Sym</th>
                        <th width="9%" >Name</th>
                        <th width="8%">Genesis</th>
                        <th width="10%">Creator</th>
                        <th width="26%">Summary</th>
                        <th width="34%">
                            Links
                        </th>
                        <th width="6%" class="text-right">
                            @role('sysop')
                            <a href="/coins/create" class="btn btn-xs btn-success"><i class="fa fa-fw fa-plus"></i></a>
                            @endrole
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coins as $coin)
                    <tr class='clickable-row' onclick="window.location = '/coins/{{ $coin->id }}'" style=" cursor: pointer; ">
                        <td width="3%" class="text-center">
                            @if($coin->logo) <a href="{{ $coin->logo }}"><img src="{{ $coin->logo }}" style="height: 1.5em"></a> @endif
                        </td>
                        <td width="4%" class="text-right">
                            <span class="badge"><small> {{ $coin->symbol }} </small> </span>
                        </td>
                        <td width="9%">
                            <b>{{ $coin->name }}</b> 
                        </td>
                        <td width="8%"><small>@if($coin->genesis_date){{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}@endif</small></td>
                        <td width="10%"><small>{{ $coin->creator }}</small></td>
                        <td width="26%"><small>{{ $coin->summary }}</small></td>
                        <td width="34%">
                            <div class="btn-group">
                                @if($coin->website)<a class="btn btn-default btn-xs" href="{{ $coin->website }}"><i class="fa fa-fw fa-home"></i></a>@endif
                                @if($coin->source)<a class="btn btn-default btn-xs" href="{{ $coin->source }}"><i class="fa fa-fw fa-github-alt"></i></a>@endif
                                @if($coin->paper)<a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><i class="fa fa-fw fa-file"></i></a>@endif
                                @if($coin->twitter)<a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><i class="fa fa-fw fa-twitter"></i></a>@endif
                                @if($coin->reddit)<a class="btn btn-default btn-xs" href="{{ $coin->reddit }}"><i class="fa fa-fw fa-reddit"></i></a>@endif
                                @if($coin->wikipedia)<a class="btn btn-default btn-xs" href="{{ $coin->wikipedia }}"><i class="fa fa-fw fa-wikipedia-w"></i></a>@endif
                                @if($coin->docs)<a class="btn btn-default btn-xs" href="{{ $coin->docs }}"><i class="fa fa-fw fa-book"></i></a>@endif
                            </div>
                        </td>
                        <td width="6%" class="text-right">
                            <a class="btn btn-default btn-xs" href="/coins/{{ $coin->id }}"><i class="fa fa-fw fa-eye"></i></a>
                            @role('sysop')
                            <a href="/coins/{{ $coin->id }}/edit" class="btn btn-xs btn-default"><i class="fa fa-fw fa-pencil"></i></a></td>
                            @endrole
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection