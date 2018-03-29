@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/images/"><i class="fa fa-briefcase fa-fw"></i> Images</a></li>
<li><a href="/admin/images/{{$image->id}}/edit"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit Image {{$image->id}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($image, ['route' => ['images.update', $image],'method' => 'PUT']) !!}
                
                    @include('admin._image-form-fields')

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/images" class="form-control btn btn-default">Cancel</a>
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