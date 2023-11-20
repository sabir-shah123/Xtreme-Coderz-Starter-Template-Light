<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fence;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboard(Request $req)
    {
        return view('admin.dashboard', get_defined_vars());
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile.userprofile', get_defined_vars());
    }
    public function general(Request $req)
    {
        $user = auth()->user();
        $req->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users,phone,' . $user->id,
        ]);

        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        if ($req->photo) {
            $user->photo = uploadFile($req->photo, 'uploads/profile', $req->name);
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function password(Request $req)
    {
        $user = authId();
        $req->validate([
            'current_password' => 'required|password',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        $user->password = bcrypt($req->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated Successfully!');
    }
}
