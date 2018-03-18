<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends AdminController
{

    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(60);
        return view('admin.users')->with(['users'=>$users]);
    }

    public function show($id)
    {
        return redirect('/admin/users/'.$id.'/edit/');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user-create')->with(['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        $request_values = $request->all();
        $request_values['password'] = \Hash::make($request_values['password']);
        $user = new User($request_values);
        if (!$user->save()) {
            return back()->with('error', 'Unable to save user');
        }

        $roles = Role::all();
        $setroles = $request->get('roles');
        if ($setroles == null) $setroles = array();
        foreach ($roles as $role) {
            if (array_key_exists($role->id, $setroles)) {
                $user->roles()->attach($role->id);
            }
        }        

        return \Redirect::route('users.index')->with('success', 'User #'.$user->id.' has been added.');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.user-edit')->with(['user'=>$user,'roles'=>$roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request_values = $request->all();
        if (strlen($request_values['newPassword']) > 0) {
            $request_values['password'] = \Hash::make($request_values['newPassword']);
        }
        $user->update($request_values);

        //Handle Roles
        $roles = Role::all();
        $setroles = $request->get('roles');
        if ($setroles == null) $setroles = array();
        foreach ($roles as $role) {
            $user->roles()->detach($role);
            if (array_key_exists($role->id, $setroles)) {
                $user->roles()->attach($role->id);
            }
        }
        
        if (!$user->save()) {
            return back()->with('error', 'Unable to save user');
        }
        return \Redirect::route('users.index')->with('success', 'User #'.$user->id.' has been update.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return \Redirect::back()->with('message', 'User #'.$id.' has been deleted');
    }

}
