<?php

namespace App\Http\Controllers;
use App\Traits\LastUpdate;
use App\ICO;

use Illuminate\Http\Request;

class ICOController extends Controller
{
    public function index()
    {
        $icos = ICO::paginate(60);
        $last_updated = ICO::lastUpdated();
        return view('icos')->with(['icos'=>$icos, 'last_updated'=> $last_updated, 'title'=>'Initial Coin Offerings']);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $ico = ICO::findOrFail($id);
        } else {
            $ico = ICO::where('slug','=',$id)->firstOrFail();
        }
        return view('ico')->with(['ico'=>$ico, 'title'=>$ico->title.' - Bit Partner']);
    }

}
