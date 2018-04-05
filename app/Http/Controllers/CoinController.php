<?php

namespace App\Http\Controllers;
use App\Coin;

class CoinController extends Controller
{
    public function index()
    {
        $coins = Coin::orderBy('genesis_date','asc')->paginate(60);
        $last_updated = Coin::lastUpdated();
        return view('coins')->with(['coins'=>$coins, 'last_updated'=> $last_updated]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $coin = Coin::findOrFail($id);
        } else {
            $coin = Coin::where('slug','=',$id)->firstOrFail();
        }
        return view('coin')->with(['coin'=>$coin]);
    }

}
