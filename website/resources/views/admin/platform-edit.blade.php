@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/blockchain-platforms/">Platforms</a></li>
<li><a href="/admin/blockchain-platforms/{{$platform->id}}/edit">Edit Platform {{$platform->name}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($platform, ['route' => ['blockchain-platforms.update', $platform],'method' => 'PUT']) !!}
                
                    @include('admin._platform-form-fields')

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/blockchain-platforms" class="form-control btn btn-default">Cancel</a>
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