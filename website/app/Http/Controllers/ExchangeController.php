<?php

namespace App\Http\Controllers;
use App\Traits\LastUpdate;
use App\Exchange;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    use LastUpdate;

    public function index()
    {
        $exchanges = Exchange::orderBy('genesis_date','asc')->paginate(60);
        $last_updated = Exchange::lastUpdated();
        return view('exchanges')->with(['exchanges'=>$exchanges, 'last_updated'=> $last_updated]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $exchange = Exchange::findOrFail($id);
        } else {
            $exchange = Exchange::where('slug','=',$id)->firstOrFail();
        }
        return view('exchange')->with(['exchange'=>$exchange]);
    }


}
