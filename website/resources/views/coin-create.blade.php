@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset 2 col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-body">

                {!! Form::open(['route' => ['coins.store'],'method' => 'POST']) !!}

                @include('_coin-form-fields')
                
                <div class="form-group">
                    <div class="col-md-6">
                        <button href="/coins/" class="form-control btn btn-default col-md-6">Cancel</button>
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
@endsection