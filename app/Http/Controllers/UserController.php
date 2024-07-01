<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request) {
        $users = User::withTrashed()
            ->with('roles')
            ->select(['id', 'name', 'email', 'deleted_at'])
            ->paginate(25);
        
        $roles = Role::all();
        return view('pages.dashboard.user.index', compact('roles', 'users'));
    }

    public function create() {
        $roles = Role::all();
        return view('pages.dashboard.user.create', compact('roles'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|integer|in:1,2,3',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign role based on the number
        switch ($validatedData['role']) {
            case 1:
                $user->assignRole('manager');
                break;
            case 2:
                $user->assignRole('admin');
                break;
            case 3:
                $user->assignRole('employee');
                break;
        }

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id) {
        $roles = Role::all();
        $user = User::withTrashed()->with('roles')->find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('pages.dashboard.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id) {
        // Fetch the user including soft-deleted ones
        $user = User::withTrashed()->findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|integer|in:1,2,3',
        ]);

        // Update user details
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        // Remove all roles before assigning the new one
        $user->roles()->detach();

        // Assign role based on the number
        switch ($validatedData['role']) {
            case 1:
                $user->assignRole('manager');
                break;
            case 2:
                $user->assignRole('admin');
                break;
            case 3:
                $user->assignRole('employee');
                break;
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function suspend(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User suspended successfully');
    }

    public function restore($id) {
        $user = User::withTrashed()->find($id);

        if ($user && $user->trashed()) {
            $user->restore();
            return redirect()->route('users.index')->with('success', 'User restored successfully.');
        }

        return redirect()->route('users.index')->with('error', 'User not found or not deleted.');
    }



    public function assignRole(User $user, Request $request){
        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success', 'Role assigned successfully');
    }
}
