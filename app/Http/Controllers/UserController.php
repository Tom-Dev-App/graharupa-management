<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request) {
        if(auth()->user()->role_id !== Role::ADMIN) {
            $users = User::withTrashed()
            ->with('role')
            ->select(['id', 'name', 'email', 'deleted_at', 'role_id'])
            ->paginate(25);
            $roles = Role::where('name', '!=', 'ADMIN')->get();
        return view('pages.dashboard.user.index', compact('roles', 'users'));

        }

        $users = User::withTrashed()
            ->with('role')
            ->where('role_id', '!=', 1)
            ->select(['id', 'name', 'email', 'deleted_at', 'role_id'])
            ->paginate(25);
            $roles = Role::where('name', '!=', 'ADMIN')->get();
        return view('pages.dashboard.user.index', compact('roles', 'users'));
    }

    public function create() {
        Gate::authorize('admin');
        $roles = Role::where('name', '!=', 'ADMIN')->get();
        return view('pages.dashboard.user.create', compact('roles'));
    }

    public function store(Request $request) {
        Gate::authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,id',
        ]);
        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => (int) $validatedData['role'], // Cast 'role' to integer
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id) {
        $id = (int)$id;

        Gate::authorize('admin');
        $roles = Role::where('name', '!=', 'ADMIN')->get();
        $user = User::withTrashed()->with('role')->where('role_id', '!=', 1)->find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('pages.dashboard.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id) {
        $id = (int)$id;

        Gate::authorize('admin');
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
        $user->role_id = $validatedData['role'];
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();


        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function suspend(User $user) {
        Gate::authorize('admin');
        if($user->role_id === 1) {
            return redirect()->route('users.index')->with('error', 'Can\'t suspend ADMIN Role!');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User suspended successfully');
    }

    public function restore($id) {
        Gate::authorize('admin');
        $user = User::withTrashed()->find($id);
        if($user->role_id === 1) {
            return redirect()->route('users.index')->with('error', 'Can\'t suspend ADMIN Role!');
        }
        if ($user && $user->trashed()) {
            $user->restore();
            return redirect()->route('users.index')->with('success', 'User restored successfully.');
        }

        return redirect()->route('users.index')->with('error', 'User not found or not deleted.');
    }
}