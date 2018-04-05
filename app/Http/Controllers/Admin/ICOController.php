<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\ICO;

class ICOController extends AdminController
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
        $icos = ICO::orderBy('id','asc')->paginate(60);
        return view('admin.icos')->with(['icos'=>$icos]);
    }

    public function show($id)
    {
        return redirect('/admin/icos/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.ico-create');
    }

    public function store(Request $request)
    {
        $ico = new ICO($request->all());
        if (!$ico->save()) {
            return back()->with('error', 'Unable to save ico');
        }
        return redirect('/admin/icos')->with('success', 'ICO #'.$ico->id.' has been added.');
    }

    public function edit($id)
    {

        $ico = ICO::findOrFail($id);
        return view('admin.ico-edit')->with(['ico'=>$ico]);
    }

    public function update(Request $request, $id)
    {

        $ico = ICO::findOrFail($id);
        $ico->update($request->all());
        if (!$ico->save()) {
            return back()->with('error', 'Unable to save ico');
        }
        return redirect('/admin/icos/')->with('success', 'ICO #'.$ico->id.' has been updated.');
    }

    public function destroy($id)
    {

        ICO::destroy($id);
        return \Redirect::back()->with('message', 'ICO #'.$id.' has been deleted');
    }

}
