<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ManagerUserController extends Controller
{

    public function ajaxAll() {
        // $currentUser = auth()->user();
        $users = User::withTrashed()->with('roles')
            ->where('id', '!=', 1)
            ->select(['id', 'name', 'email', 'deleted_at']);

        return datatables()->of($users)
            ->addIndexColumn() // This adds the DT_RowIndex column
            ->addColumn('status', function ($user) {
                return $user->deleted_at 
                    ? '<span class="badge badge-danger">Suspended</span>' 
                    : '<span class="badge badge-success">Active</span>';
            })
            ->addColumn('roles', function ($user) {
                $roleNames = $user->roles->pluck('name')->toArray();
                $dropdown = '<select class="role-dropdown" data-user-id="' . $user->id . '">';
                foreach (Role::all() as $role) {
                    $selected = in_array($role->name, $roleNames) ? 'selected' : '';
                    $dropdown .= '<option value="' . $role->name . '" ' . $selected . '>' . $role->name . '</option>';
                }
                $dropdown .= '</select>';
                return $dropdown;
            })
            ->addColumn('action', function ($user) {
                $buttons = '<a href="' . route('dashboard.users.update', $user->id) . '" class="btn btn-warning">Edit</a>';
                if ($user->deleted_at) {
                    $buttons .= '<form action="' . route('dashboard.users.restore', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-success">Restore</button></form>';
                } else {
                    $buttons .= '<form action="' . route('dashboard.users.suspend', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-danger">Suspend</button></form>';
                }
                return $buttons;
            })
            ->rawColumns(['status', 'roles', 'action'])
            ->make(true);
    }

    public function index(){
        // if (request()->ajax()) {
        //     $currentUser = auth()->user();
        //     $users = User::withTrashed()->with('roles')
        //         ->where('id', '!=', $currentUser->id)
        //         ->select(['id', 'name', 'email', 'deleted_at']);
            
        //     return datatables()->of($users)
        //         ->addIndexColumn() // This adds the DT_RowIndex column
        //         ->addColumn('status', function ($user) {
        //             return $user->deleted_at 
        //                 ? '<span class="badge badge-danger">Suspended</span>' 
        //                 : '<span class="badge badge-success">Active</span>';
        //         })
        //         ->addColumn('roles', function ($user) {
        //             $roleNames = $user->roles->pluck('name')->toArray();
        //             $dropdown = '<select class="role-dropdown" data-user-id="' . $user->id . '">';
        //             foreach (Role::all() as $role) {
        //                 $selected = in_array($role->name, $roleNames) ? 'selected' : '';
        //                 $dropdown .= '<option value="' . $role->name . '" ' . $selected . '>' . $role->name . '</option>';
        //             }
        //             $dropdown .= '</select>';
        //             return $dropdown;
        //         })
        //         ->addColumn('action', function ($user) {
        //             $buttons = '<a href="' . route('dashboard.users.update', $user->id) . '" class="btn btn-warning">Edit</a>';
        //             if ($user->deleted_at) {
        //                 $buttons .= '<form action="' . route('dashboard.users.restore', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-success">Restore</button></form>';
        //             } else {
        //                 $buttons .= '<form action="' . route('dashboard.users.suspend', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-danger">Suspend</button></form>';
        //             }
        //             return $buttons;
        //         })
        //         ->rawColumns(['status', 'roles', 'action'])
        //         ->make(true);
        // }
        if(request()->ajax()){
            // $currentUser = auth()->user();
            // $users = User::withTrashed()->with('roles')
            //     ->where('id', '!=', $currentUser->id)
            //     ->select(['id', 'name', 'email', 'deleted_at']);
       
            $users = User::withTrashed()->with('roles')
            ->whereHas('roles', function($query) {
                $query->whereIn('name', ['admin', 'employee']);
            })
            ->select(['id', 'name', 'email', 'deleted_at']);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('status', function ($user) {
                    return $user->deleted_at 
                        ? '<span class="badge badge-danger">Suspended</span>' 
                        : '<span class="badge badge-success">Active</span>';
                })
                ->addColumn('roles', function ($user) {
                    $roleNames = $user->roles->pluck('name')->toArray();
                    $dropdown = '<select class="role-dropdown" data-user-id="' . $user->id . '">';
                    foreach (Role::all() as $role) {
                        $selected = in_array($role->name, $roleNames) ? 'selected' : '';
                        $dropdown .= '<option value="' . $role->name . '" ' . $selected . '>' . $role->name . '</option>';
                    }
                    $dropdown .= '</select>';
                    return $dropdown;
                })
                ->addColumn('action', function ($user) {
                    $buttons = '<a href="' . route('dashboard.users.edit', $user->id) . '" class="btn btn-warning">Edit</a>';
                    if ($user->deleted_at) {
                        $buttons .= '<form action="' . route('dashboard.users.restore', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-success">Restore</button></form>';
                    } else {
                        $buttons .= '<form action="' . route('dashboard.users.suspend', $user->id) . '" method="POST" style="display:inline;">' . csrf_field() . '<button type="submit" class="btn btn-danger">Suspend</button></form>';
                    }
                    return $buttons;
                })
                ->rawColumns(['status', 'roles', 'action'])
                ->make(true);
        }
        return view('pages.dashboard.manage-users.index');
    }

    public function create()
{
    $roles = Role::all(); // Fetch all roles
    return view('pages.dashboard.manage-users.create', compact('roles'));
}


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Validate role
        ]);
    
        $data['password'] = bcrypt($data['password']);
    
        $user = User::create($data);
        $user->assignRole($request->role); // Assign role
    
        return redirect()->route('dashboard.users.index');
    }
    
    public function edit(User $user)
    {
        $roles = Role::all(); // Fetch all roles
        return view('pages.dashboard.manage-users.edit', compact('user', 'roles'));
    }
    
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Validate role
        ]);
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
    
        $user->update($data);
        $user->syncRoles([$request->role]); // Sync role
    
        return redirect()->route('dashboard.users.index');
    }

    public function changeRole(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|exists:roles,name',
    ]);

    $newRole = Role::findByName($request->role);
    $user->syncRoles([$newRole]);

    return response()->json(['message' => 'User role updated successfully']);
}
    
}
