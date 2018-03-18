<?php

namespace App\Http\Controllers;
use App\Traits\LastUpdate;
use App\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('genesis_date','asc')->paginate(60);
        $last_updated = Job::lastUpdated();
        return view('jobs')->with(['jobs'=>$jobs, 'last_updated'=> $last_updated]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $job = Job::findOrFail($id);
        } else {
            $job = Job::where('slug','=',$id)->firstOrFail();
        }
        return view('job')->with(['job'=>$job]);
    }

}
