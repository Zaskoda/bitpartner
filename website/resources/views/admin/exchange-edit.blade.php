@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/decentralized-exchanges/">Exchanges</a></li>
<li><a href="/admin/decentralized-exchanges/{{$exchange->id}}/edit">Edit Exchange {{$exchange->name}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($exchange, ['route' => ['decentralized-exchanges.update', $exchange],'method' => 'PUT']) !!}
                
                    @include('admin._exchange-form-fields')

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/decentralized-exchanges" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Update!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>



                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection