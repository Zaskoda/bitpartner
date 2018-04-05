<?php

namespace App\Http\Controllers;
use App\Exchange;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::paginate(60);
        $last_updated = Exchange::lastUpdated();
        return view('exchanges')->with(['exchanges'=>$exchanges, 'last_updated'=> $last_updated]);
    }

}
