<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            return Datatables::of(User::get(['id', 'name', 'email', 'created_at']))
                ->addColumn('action', function($entity) {
                    return auth()->user()->id != $entity->id ? view('src.partials.table.action', [
                        'destoryWarningText' => 'Are you sure, Delete this user?',
                        'destroyRoute' => route('users.destroy', ['user' => $entity->id]),
                    ]) : '';
                })
                ->rawColumns(['action'])
                ->editColumn('created_at', function ($entity) {
                    return view('src.partials.table.date')->with('date', $entity->created_at);
                })
                ->make(true);
        }
        return view('src.pages.users.index');
    }

    public function create() {
        return view('src.pages.users.create');
    }

    public function store(Request $request) {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
            ]);

            return redirect()->route('users.index')->with('message', 'User Added Successfully');
        } catch(\Exception $e) {
            return redirect()->route('users.index')->with('message-error', 'User Added Failed, Try Again!');
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
