<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(Request $request) {
        $roles = Role::all();
        return view('src.pages.users.roles.index', [
            'roles' => $roles,
        ]);
    }

    public function create() {
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('src.pages.users.roles.create', [
            'all_permissions' => $all_permissions,
            'permission_groups' => $permission_groups,
        ]);
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|max:100|unique:roles'
            ], [
                'name.requried' => 'Please give a role name'
            ]);

            $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
            $permissions = $request->input('permissions');

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }

            return redirect()->route('admin.roles.index')->with('message', 'Role Created Successfully');
        } catch(\Exception $e) {
            return redirect()->route('admin.roles.index')->with('message-error', 'Role Created Failed, Try Again!');
        }
    }

    public function edit($id) {
        $role = Role::findById($id, 'web');
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('src.pages.users.roles.edit', [
            'role' => $role,
            'all_permissions' => $all_permissions,
            'permission_groups' => $permission_groups,
        ]);
    }

    public function update(Request $request, $id) {
        try {
            $request->validate([
                'name' => 'required|max:100|unique:roles,name,' . $id
            ], [
                'name.requried' => 'Please give a role name'
            ]);

            $role = Role::findById($id, 'web');
            $permissions = $request->input('permissions');

            if (!empty($permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($permissions);
            }

            return redirect()->route('admin.roles.index')->with('message', 'Role Updated Successfully');
        } catch(\Exception $e) {
            return redirect()->route('admin.roles.index')->with('message-error', 'Role Updated Failed, Try Again!');
        }
    }

    public function destroy($id) {
        try {
            $role = Role::findById($id, 'web');
            if (!is_null($role)) $role->delete();
            
            return redirect()->route('admin.roles.index')->with('message', 'Role Delete Successfully');
        } catch(\Exception $e) {
            return redirect()->route('admin.roles.index')->with('message-error', 'Role Delete Failed, Try Again!');
        }
    }
}
