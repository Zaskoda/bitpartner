@extends('layouts.app')

@section('content')
    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-body">

                {!! Form::model($coin, ['route' => ['coins.update', $coin],'method' => 'PUT']) !!}
            
                @include('_coin-form-fields')
                
                <div class="form-group">

                    <div class="col-md-6">
                        <a href="/coins/{{ $coin->id }}/" class="form-control btn btn-default">Cancel</a>
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit('Update!',['class'=>'form-control btn btn-success']) }}
                    </div>
                </div>

                {!! Form::token() !!}

                {!! Form::close() !!}
                </dov>
            </div>
        </div>
    </div>
@endsection