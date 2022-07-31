<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('src.pages.users.profile.index');
    }

    public function update(Request $request) {
        try {
            $user = User::find(auth()->user()->id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('user.profile')->with('message', 'Profile Update Successfully');
        } catch (\Exception $e) {
            return redirect()->route('user.profile')->with('message-error', 'Profile Update Failed, Try Again!');
        }
    }

    public function changePassword(Request $request) {
        try {
            if(!Hash::check($request->old_password, auth()->user()->password)) {
                return redirect()->route('user.profile')->with('message-error', 'Old Password Not Matched, Try Again!');
            } else if($request->new_password != $request->confirm_password) {
                return redirect()->route('user.profile')->with('message-error', 'Confirm Password Not Matched, Try Again!');
            }

            $user = User::find(auth()->user()->id);

            $user->update([
                'password'=> Hash::make($request->new_password),
            ]);

            return redirect()->route('user.profile')->with('message', 'Password Change Successfully');
        } catch(\Exception $e) {
            return redirect()->route('user.profile')->with('message-error', 'Password Change Failed, Try Again!');
        }
    }
}
