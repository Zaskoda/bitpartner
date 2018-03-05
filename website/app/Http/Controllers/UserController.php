<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(60);
        return view('users')->with(['users'=>$users]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user')->with(['user'=>$user]);
    }

    public function create()
    {
        return view('user-create');
    }

    public function store(Request $request)
    {
        $request_values = $request->all();
        $request_values['password'] = \Hash::make($request_values['password']);
        $user = new User($request_values);
        if (!$user->save()) {
            return back()->with('error', 'Unable to save user');
        }
        return \Redirect::route('users.index')->with('success', 'User #'.$user->id.' has been added.');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('user-edit')->with(['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        if (!$user->save()) {
            return back()->with('error', 'Unable to save user');
        }
        return \Redirect::route('users.index')->with('success', 'User #'.$user->id.' has been update.');
    }

    public function destroy()
    {
        User::destroy($id);
        return \Redirect::route('user.index')->with('message', 'User #'.$id.' has been deleted');
    }

}
