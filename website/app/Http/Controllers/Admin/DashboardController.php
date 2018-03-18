<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Coin;

class DashboardController extends AdminController
{

    public function index()
    {
        $counts['coins'] = Coin::count();
        return view('admin.dashboard')->with(['counts'=>$counts]);
    }

}
