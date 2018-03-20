@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/articles/"><i class="fa fa-sticky-note fa-fw"></i> Articles</a></li>
<li><a href="/admin/articles/{{$article->id}}/edit"><i class="fa fa-fw fa-1x fa-pencil"></i> Edit Article {{$article->name}}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::model($article, ['route' => ['articles.update', $article],'method' => 'PUT']) !!}
                
                    @include('admin._article-form-fields')

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/articles" class="form-control btn btn-default">Cancel</a>
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