<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Page;

class PageController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $pages = Page::orderBy('id','asc')->paginate(60);
        return view('admin.pages')->with(['pages'=>$pages]);
    }

    public function show($id)
    {
        return redirect('/admin/pages/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.page-create');
    }

    public function store(Request $request)
    {
        $page = new Page($request->all());
        if (!$page->save()) {
            return back()->with('error', 'Unable to save page');
        }
        return redirect('/admin/pages')->with('success', 'Page #'.$page->id.' has been added.');
    }

    public function edit($id)
    {

        $page = Page::findOrFail($id);
        return view('admin.page-edit')->with(['page'=>$page]);
    }

    public function update(Request $request, $id)
    {

        $page = Page::findOrFail($id);
        $page->update($request->all());
        $page->user_id = \Auth::user()->id;
        if (!$page->save()) {
            return back()->with('error', 'Unable to save page');
        }
        return redirect('/admin/pages/')->with('success', 'Page #'.$page->id.' has been updated.');
    }

    public function destroy($id)
    {

        Page::destroy($id);
        return \Redirect::back()->with('message', 'Page #'.$id.' has been deleted');
    }

}
