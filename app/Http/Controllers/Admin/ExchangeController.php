<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exchange;

class ExchangeController extends AdminController
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
        $exchanges = Exchange::orderBy('id','asc')->paginate(60);
        return view('admin.exchanges')->with(['exchanges'=>$exchanges]);
    }

    public function show($id)
    {
        return redirect('/admin/decentralized-exchanges/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.exchange-create');
    }

    public function store(Request $request)
    {
        $exchange = new Exchange($request->all());
        if (!$exchange->save()) {
            return back()->with('error', 'Unable to save exchange');
        }
        return redirect('/admin/decentralized-exchanges')->with('success', 'Exchange #'.$exchange->id.' has been added.');
    }

    public function edit($id)
    {

        $exchange = Exchange::findOrFail($id);
        return view('admin.exchange-edit')->with(['exchange'=>$exchange]);
    }

    public function update(Request $request, $id)
    {

        $exchange = Exchange::findOrFail($id);
        $exchange->update($request->all());
        if (!$exchange->save()) {
            return back()->with('error', 'Unable to save exchange');
        }
        return redirect('/admin/decentralized-exchanges/')->with('success', 'Exchange #'.$exchange->id.' has been updated.');
    }

    public function destroy($id)
    {

        Exchange::destroy($id);
        return \Redirect::back()->with('message', 'Exchange #'.$id.' has been deleted');
    }

}
