<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CredentialChangeMail;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(Request $req)
    {
        if ($req->ajax()) {
            $query = User::where('id', '!=', 1)->orderBy('id', 'DESC');
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->is_active == 1) {
                        $html = '<span class="badge badge-soft-success">Active</span>';
                    } else {
                        $html = '<span class="badge badge-soft-danger">Disabled</span>';
                    }
                    return $html;
                })

                ->editColumn('first_name', function ($row) {
                    $html = $row->first_name . ' ' . $row->last_name;
                    return $html;
                })

                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '
                        <div class="dropdown d-inline-block float-right">
                            <a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4" style="">
                    ';
                    if ($row->is_active == 1) {
                        $html .= '
                        <a class="dropdown-item" href="' . route('user.is-active', $row->id) . '" onclick="event.preventDefault(); statusMsg(\'' . route('user.is-active', $row->id) . '\')">Disable</a>
                        ';
                    } else {
                        $html .= '
                        <a class="dropdown-item" href="' . route('user.is-active', $row->id) . '" onclick="event.preventDefault(); statusMsg(\'' . route('user.is-active', $row->id) . '\')">Activate</a>
                        ';
                    }
                    $html .= '
                                 <a class="dropdown-item" href="' . route('user.edit', $row->id) . '" class="mr-2">Edit</a>
                                <a class="dropdown-item" href="' . route('user.delete', $row->id) . '" onclick="event.preventDefault(); deleteMsg(\'' . route('user.delete', $row->id) . '\')">Delete</a>
                        ';
                    return $html;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.user.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.user.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        $data = User::find($id);
        return view('admin.user.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',
            'email' => 'required | email | max:255 | unique:users,email,' . $id,
            'phone' => 'required | string | max:255 | unique:users,phone,' . $id,
        ]);
       
        $msg = is_null($id) ? 'User Added Successfully!' : 'User Updated Successfully!';
        $user = User::find($id) ?? new User();
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->role = 1;
        $user->is_active = $req->is_active;
        if ($req->password) {
            $user->password = Hash::make($req->password);
        }
        $user->save();
        return redirect()->route('user.list')->with('success', $msg);

    }

    public function delete($id = null)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Company Delete Successfully!');
    }

    public function isActive($id)
    {
        $user = User::find($id);
        $user->is_active = $user->is_active == 1 ? 0 : 1;
        $user->save();
        return back()->with('success', 'Company Status Changed Successfully.');
    }

}
