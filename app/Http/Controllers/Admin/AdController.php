<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdRequest;
use App\Models\Ad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.ads.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            
            $brands = Ad::select();
            
            return DataTables::of($brands)
                ->addIndexColumn()
                ->addColumn('actions', "admin.ads.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function fetchAds(Request $request)
    {
       return Ad::fetchAds($request);
    }

    public function edit(Ad $ad)
    {
        return view("admin.ads.edit", [
            "ad" => $ad
        ]);
    }

    public function update(AdRequest $request, Ad $ad)
    {
        $validation = $request->validated();
        $ad->update($validation);
        return redirect()->route("admin.ads.index");
    }
}