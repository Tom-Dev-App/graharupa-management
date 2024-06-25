<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUsersData()
{
    $users = User::withTrashed()
    ->with('roles')
    ->where('id', '!=', 1)
    ->select(['id', 'name', 'email', 'deleted_at'])
    ->get();

    return response()->json($users);
}

public function index(Request $request) {
    $users = User::withTrashed()
    ->with('roles')
    ->where('id', '!=', 1)
    ->select(['id', 'name', 'email', 'deleted_at'])
    ->paginate();
   
    $roles = Role::all();
    return view('pages.dashboard.user.index', compact('roles', 'users'));
}

    public function create(){
        return view('pages.dashboard.user.create');
    }

    public function store(Request $request){
        dd($request->all());
    }

    public function edit(User $user){
        return view('pages.dashboard.user.edit', compact('user'));
    }

    public function suspend(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User suspended successfully');
    }

    public function restore(User $user){
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully');
    }

    public function assignRole(User $user, Request $request){
        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success', 'Role assigned successfully');
    }
}
