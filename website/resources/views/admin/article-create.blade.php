@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/articles/"><i class="fa fa-sticky-note fa-fw"></i> Articles</a></li>
<li><a href="/admin/articles/create/"><span class="fa fa-fw fa-plus"></span> Add New Article</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-body">
                    {!! Form::open(['route' => ['articles.store'],'method' => 'POST']) !!}
                    
                    @include('admin._article-form-fields')
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/articles/" class="form-control btn btn-default">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Create Article!',['class'=>'form-control btn btn-success']) }}
                        </div>
                    </div>

                    {!! Form::token() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection