<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ManagerUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::withTrashed()->select('*');
            return datatables()->of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('manager.users.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<form action="'.route('manager.users.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    


        return view('pages.dashboard.manager.users.index');
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('pages.dashboard.manager.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('manager.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('manager.users.index')->with('success', 'User deleted successfully.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('manager.users.index')->with('success', 'User restored successfully.');
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('manager.users.index')->with('success', 'Role assigned successfully.');
    }
}
