@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/decentralized-exchanges/"><i class="fa fa-exchange fa-fw"></i> Exchanges</a></li>
<li><a href="/admin/decentralized-exchanges/create/"><span class="fa fa-fw fa-plus"></span> Add New Exchange</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['decentralized-exchanges.store'],'method' => 'POST']) !!}
                    
                    @include('admin._exchange-form-fields')
                    <div class="form-group">
                        <div class="col-md-6">
                            <button href="/decentralized-exchanges/" class="form-control btn btn-default col-md-6">Cancel</button>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Create!',['class'=>'form-control btn btn-success col-md-6']) }}
                        </div>
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection