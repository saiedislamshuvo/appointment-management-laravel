<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            return Datatables::of(User::all())
                ->addColumn('roles', function($entity) {
                    $roleHtml = '';
                    foreach($entity->roles as $role) {
                        $roleHtml .= view('src.partials.table.bagde', [
                            'value' => $role->name,
                        ]);
                    }
                    return $roleHtml;
                })
                ->addColumn('action', function($entity) {
                    return auth()->user()->id != $entity->id ? view('src.partials.table.action', [
                        'editRoute' => route('users.edit', ['user' => $entity->id]),
                        'destoryWarningText' => 'Are you sure, Delete this user?',
                        'destroyRoute' => route('users.destroy', ['user' => $entity->id]),
                    ]) : '';
                })
                ->rawColumns(['roles', 'action'])
                ->editColumn('created_at', function ($entity) {
                    return view('src.partials.table.date')->with('date', $entity->created_at);
                })
                ->make(true);
        }
        return view('src.pages.users.index');
    }

    public function create() {
        $roles  = Role::all();
        return view('src.pages.users.create', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request) {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
            ]);

            if ($request->roles) {
                $user->assignRole($request->roles);
            }

            return redirect()->route('users.index')->with('message', 'User Added Successfully');
        } catch(\Exception $e) {
            return redirect()->route('users.index')->with('message-error', 'User Added Failed, Try Again!');
        }
    }

    public function edit($id) {
        $roles  = Role::all();
        $user = User::findorfail($id);
        return view('src.pages.users.edit', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id) {
        try {
            $user = User::findorfail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->roles) {
                $user->roles()->detach();
                $user->assignRole($request->roles);
            }

            return redirect()->route('users.index')->with('message', 'User Updated Successfully');
        } catch(\Exception $e) {
            return redirect()->route('users.index')->with('message-error', 'User Updated Failed, Try Again!');
        }
    }

    public function destroy($id) {
        try {
            if(auth()->user()->id == $id) 
                return redirect()->route('users.index')->with('message-error', 'User Delete Failed, Couldn\'t delete same user!');
            
            User::findorfail($id)->delete();

            return redirect()->route('users.index')->with('message', 'User Delete Successfully');
        } catch(\Exception $e) {
            return redirect()->route('users.index')->with('message-error', 'User Delete Failed, Try Again!');
        }
    }
}
