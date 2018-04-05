<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Coin;
use App\ICO;
use App\Exchange;
use App\Job;
use App\Platform;

class DashboardController extends AdminController
{

    public function index()
    {
        $counts['coins'] = Coin::count();
        $counts['platforms'] = Platform::count();
        $counts['jobs'] = Job::count();
        $counts['exchanges'] = Exchange::count();
        $counts['icos'] = ICO::count();
        return view('admin.dashboard')->with(['counts'=>$counts]);
    }

}
