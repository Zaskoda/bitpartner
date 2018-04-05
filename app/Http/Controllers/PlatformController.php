<?php

namespace App\Http\Controllers;
use App\Traits\LastUpdate;
use App\Platform;

use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::paginate(60);
        $last_updated = Platform::lastUpdated();
        return view('platforms')->with(['platforms'=>$platforms, 'last_updated'=> $last_updated]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $platform = Platform::findOrFail($id);
        } else {
            $platform = Platform::where('slug','=',$id)->firstOrFail();
        }
        return view('platform')->with(['platform'=>$platform]);
    }

}
