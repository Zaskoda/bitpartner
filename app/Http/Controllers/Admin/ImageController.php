<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends AdminController
{
    public function index()
    {
        $images = Image::orderBy('id','desc')->paginate(60);
        return view('admin.images')->with(['images'=>$images]);
    }

    public function show($id)
    {
        return redirect('/admin/images/'.$id.'/edit/');
    }

    public function create()
    {
        return view('admin.image-create');
    }

    public function destroy($id)
    {

        Image::destroy($id);
        return \Redirect::back()->with('message', 'Image #'.$id.' has been deleted');
    }

}
