@extends('layouts.admin')

@section('content')
    <p class="text-center">This is the Dashboard</p>
    <div class="row">
        <div class="col-sm-5 text-right">
            Open Cryptocurrency Coins:
        </div>
        <div class="col-sm-2 text-center">
            {{ $counts['coins'] }}
        </div>
        <div class="col-sm-5">
            <div class="btn-group">
                <a href="/admin/coins/create/" class="btn btn-sm btn-default btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a>
                <a href="/admin/coins/" class="btn btn-sm btn-default btn-primary btn-xs"><i class="fa fa-fw fa-list"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 text-right">
            Decentralized Exchanges:
        </div>
        <div class="col-sm-2 text-center">
            {{ $counts['exchanges'] }}
        </div>
        <div class="col-sm-5">
            <div class="btn-group">
                <a href="/admin/decentralized-exchanges/create/" class="btn btn-sm btn-default btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a>
                <a href="/admin/decentralized-exchanges/" class="btn btn-sm btn-default btn-primary btn-xs"><i class="fa fa-fw fa-list"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 text-right">
            Blockchain Platforms:
        </div>
        <div class="col-sm-2 text-center">
            {{ $counts['platforms'] }}
        </div>
        <div class="col-sm-5">
            <div class="btn-group">
                <a href="/admin/blockchain-platforms/create/" class="btn btn-sm btn-default btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a>
                <a href="/admin/blockchain-platforms/" class="btn btn-sm btn-default btn-primary btn-xs"><i class="fa fa-fw fa-list"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 text-right">
            Blockchain Jobs:
        </div>
        <div class="col-sm-2 text-center">
            {{ $counts['jobs'] }}
        </div>
        <div class="col-sm-5">
            <div class="btn-group">
                <a href="/admin/blockchain-jobs/create/" class="btn btn-sm btn-default btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a>
                <a href="/admin/blockchain-jobs/" class="btn btn-sm btn-default btn-primary btn-xs"><i class="fa fa-fw fa-list"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 text-right">
            ICOs:
        </div>
        <div class="col-sm-2 text-center">
            {{ $counts['icos'] }}
        </div>
        <div class="col-sm-5">
            <div class="btn-group">
                <a href="/admin/icos/create/" class="btn btn-sm btn-default btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a>
                <a href="/admin/icos/" class="btn btn-sm btn-default btn-primary btn-xs"><i class="fa fa-fw fa-list"></i></a>
            </div>
        </div>
    </div>
@endsection