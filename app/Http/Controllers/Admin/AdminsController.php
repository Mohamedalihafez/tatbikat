<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{
    //

    public function index()
    {
        return view("admin.admins.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $admins = User::whereRoleIs("admin")->select();

            return DataTables::of($admins)
                ->addIndexColumn()
                ->addColumn('actions', "admin.admins.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function update(Request $request, User $user)
    {
        $user->detachRole("admin");
        $user->attachRole("user");
        return redirect()->route("admin.admins.index");
    }
}