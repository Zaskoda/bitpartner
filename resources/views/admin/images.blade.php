@extends('layouts.admin')

@section('breadcrumb')
<li><a href="/admin/images"><i class="fa fa-briefcase fa-fw"></i> Images</a></li>
@endsection

@section('content')
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>img</th>
                <th>slug</th>
                <th colspan="2" class="text-right">
                    <a href="/admin/images/create" class="btn btn-xs btn-success pull-right"><i class="fa fa-fw fa-plus"></i> Add New Image</a></td>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
            <tr>
                <td>
                    <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}.jpg">
                    <img src="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-sm.jpg">
                    </a>
                </td>
                <td>
                <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}.jpg">
                    {{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}.jpg
                    </a>
                [ <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-xs.jpg">xs</a> |
                <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-sm.jpg">sm</a> |
                <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-md.jpg">md</a> |
                <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-lg.jpg">lg</a> |
                <a href="{{ \Config::get('app.image_uri_base')  }}{{ $image->filename }}-xl.jpg">xl</a> ]
                </td>
                <td class="text-right">
                    {!! Form::open(['url' => url('/admin/images/'.$image->id.'/'), 
                                                'class'=> "pull-right", 
                                                'method'=>'delete', 
                                                'style'=>"display:inline",
                                                'onSubmit' => "if(!confirm('Are you sure?')){return false;}" ]) !!}
                                <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></button>
                    {!! Form::close()!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection