<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //

    public function index()
    {
        return view("admin.users.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $users = User::whereRoleIs("user")->select();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('actions', "admin.users.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function update(Request $request, User $user)
    {
        $user->detachRole("user");
        $user->attachRole("admin");
        return redirect()->route("admin.users.index");
    }
}