<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Coin;

class CoinController extends AdminController
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
        $coins = Coin::orderBy('genesis_date','asc')->paginate(60);
        return view('admin.coins')->with(['coins'=>$coins]);
    }

    public function show($id)
    {
        return redirect('/admin/coins/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.coin-create');
    }

    public function store(Request $request)
    {
        $coin = new Coin($request->all());
        if (!$coin->save()) {
            return back()->with('error', 'Unable to save coin');
        }
        return redirect('/admin/coins')->with('success', 'Coin #'.$coin->id.' has been added.');
    }

    public function edit($id)
    {

        $coin = Coin::findOrFail($id);
        return view('admin.coin-edit')->with(['coin'=>$coin]);
    }

    public function update(Request $request, $id)
    {

        $coin = Coin::findOrFail($id);
        $coin->update($request->all());
        if (!$coin->save()) {
            return back()->with('error', 'Unable to save coin');
        }
        return redirect('/admin/coins/')->with('success', 'Coin #'.$coin->id.' has been updated.');
    }

    public function destroy($id)
    {

        Coin::destroy($id);
        return \Redirect::back()->with('message', 'Coin #'.$id.' has been deleted');
    }

}
