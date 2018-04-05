<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Platform;

class PlatformController extends AdminController
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
        $platforms = Platform::orderBy('id','asc')->paginate(60);
        return view('admin.platforms')->with(['platforms'=>$platforms]);
    }

    public function show($id)
    {
        return redirect('/admin/platforms/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.platform-create');
    }

    public function store(Request $request)
    {
        $platform = new Platform($request->all());
        if (!$platform->save()) {
            return back()->with('error', 'Unable to save platform');
        }
        return redirect('/admin/blockchain-platforms')->with('success', 'Platform #'.$platform->id.' has been added.');
    }

    public function edit($id)
    {

        $platform = Platform::findOrFail($id);
        return view('admin.platform-edit')->with(['platform'=>$platform]);
    }

    public function update(Request $request, $id)
    {

        $platform = Platform::findOrFail($id);
        $platform->update($request->all());
        if (!$platform->save()) {
            return back()->with('error', 'Unable to save platform');
        }
        return redirect('/admin/blockchain-platforms/')->with('success', 'Platform #'.$platform->id.' has been updated.');
    }

    public function destroy($id)
    {

        Platform::destroy($id);
        return \Redirect::back()->with('message', 'Platform #'.$id.' has been deleted');
    }

}
