<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends AdminController
{

    public function index()
    {
        $roles = Role::orderBy('id','asc')->paginate(60);
        return view('admin.roles')->with(['roles'=>$roles]);
    }

    public function show($id)
    {
        return redirect('/admin/roles/'.$id.'/edit/');
    }

    public function create()
    {
        return view('admin.role-create');
    }

    public function store(Request $request)
    {
        $request_values = $request->all();
        $role = new Role($request_values);
        if (!$role->save()) {
            return back()->with('error', 'Unable to save role');
        }
        return \Redirect::route('roles.index')->with('success', 'Role #'.$role->id.' has been added.');
    }

    public function edit($id)
    {

        $role = Role::findOrFail($id);
        return view('admin.role-edit')->with(['role'=>$role]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        if (!$role->save()) {
            return back()->with('error', 'Unable to save role');
        }
        return \Redirect::route('roles.index')->with('success', 'Role #'.$role->id.' has been update.');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return \Redirect::back()->with('message', 'Role #'.$id.' has been deleted');
    }

}
