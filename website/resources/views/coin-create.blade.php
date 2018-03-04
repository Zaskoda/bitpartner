@extends('layouts.app')

@section('content')
<div class="col-md-8 col-lg-6">
    {!! Form::open(['route' => ['coins.store'],'method' => 'POST']) !!}

    <div class="form-group">
        <label for="name" class="col-2-sm control-label">Coin Name</label>
        <div class="col-10-sm">
        {{ Form::text('name', null, ['placeholder'=>'Bitcoin', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="symbol" class="col-2-sm control-label">Coin Symbol</label>
        <div class="col-10-sm">
        {{ Form::text('symbol', null, ['placeholder'=>'BTC', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="genesis_date" class="col-2-sm control-label">Genesis Date</label>
        <div class="col-10-sm">
        {{ Form::date('genesis_date', null, ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="homepage" class="col-2-sm control-label">Website</label>
        <div class="col-10-sm">
        {{ Form::text('website', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="forked_from" class="col-1-sm  control-label">Forked From</label>
        <div class="col-10-sm">
        {{ Form::text('forked_from', null, ['placeholder'=>'id', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="source" class="col-2-sm control-label">Source Code</label>
        <div class="col-10-sm">
        {{ Form::text('source', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-2-sm control-label">Description</label>
        <div class="col-10-sm">
        {{ Form::text('description', null, ['placeholder'=>'all about it', 'class'=>'form-control']) }}
        </div>
    </div>

    <div class="form-group">
     {{ Form::submit('Create!',['class'=>'form-control']) }}
    </div>

    {!! Form::token() !!}

    {!! Form::close() !!}
</div>

@endsection