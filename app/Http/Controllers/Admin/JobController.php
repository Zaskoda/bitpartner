<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Job;

class JobController extends AdminController
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
        $jobs = Job::orderBy('id','asc')->paginate(60);
        return view('admin.jobs')->with(['jobs'=>$jobs]);
    }

    public function show($id)
    {
        return redirect('/admin/blockchain-jobs/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.job-create');
    }

    public function store(Request $request)
    {
        $job = new Job($request->all());
        if (!$job->save()) {
            return back()->with('error', 'Unable to save job');
        }
        return redirect('/admin/blockchain-jobs')->with('success', 'Job #'.$job->id.' has been added.');
    }

    public function edit($id)
    {

        $job = Job::findOrFail($id);
        return view('admin.job-edit')->with(['job'=>$job]);
    }

    public function update(Request $request, $id)
    {

        $job = Job::findOrFail($id);
        $job->update($request->all());
        if (!$job->save()) {
            return back()->with('error', 'Unable to save job');
        }
        return redirect('/admin/blockchain-jobs/')->with('success', 'Job #'.$job->id.' has been updated.');
    }

    public function destroy($id)
    {

        Job::destroy($id);
        return \Redirect::back()->with('message', 'Job #'.$id.' has been deleted');
    }

}
