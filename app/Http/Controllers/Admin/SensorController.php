<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Sensor;

class SensorController extends AdminController
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
        $sensors = Sensor::orderBy('id','asc')->paginate(60);
        return view('admin.sensors')->with(['sensors'=>$sensors]);
    }

    public function show($id)
    {
        return redirect('/admin/sensors/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.sensor-create');
    }

    public function store(Request $request)
    {
        $sensor = new Sensor($request->all());
        $sensor->user_id = \Auth::user()->id;
        if (!$sensor->save()) {
            return back()->with('error', 'Unable to save sensor');
        }
        return redirect('/admin/sensors')->with('success', 'Sensor #'.$sensor->id.' has been added.');
    }

    public function edit($id)
    {

        $sensor = Sensor::findOrFail($id);
        return view('admin.sensor-edit')->with(['sensor'=>$sensor]);
    }

    public function update(Request $request, $id)
    {

        $sensor = Sensor::findOrFail($id);
        $sensor->update($request->all());
        $sensor->user_id = \Auth::user()->id;
        if (!$sensor->save()) {
            return back()->with('error', 'Unable to save sensor');
        }
        return redirect('/admin/sensors/')->with('success', 'Sensor #'.$sensor->id.' has been updated.');
    }

    public function destroy($id)
    {

        Sensor::destroy($id);
        return \Redirect::back()->with('message', 'Sensor #'.$id.' has been deleted');
    }

}
