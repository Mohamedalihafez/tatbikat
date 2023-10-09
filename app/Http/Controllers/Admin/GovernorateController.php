<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GovernorateRequest;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GovernorateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.governorates.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $governorates = Governorate::select();

            return DataTables::of($governorates)
                ->addIndexColumn()
                ->addColumn('name', function (Governorate $governorate) {
                    foreach(config('translatable.locales') as $locale){
                        return $governorate->translate($locale)->name;
                    }
                })
                ->addColumn("cities", function (Governorate $governorate) {
                    return view("admin.governorates.dataTables.cities", [
                        "governorate" => $governorate
                    ]);
                })
                ->addColumn('actions', "admin.governorates.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.governorates.create");
    }

    public function store(GovernorateRequest $request)
    {
        $attribute = $request->validated();

        Governorate::create($attribute);
        return redirect()->route("admin.governorates.index")->with(["", ""]);
    }

    public function edit(Governorate $governorate)
    {
        return view("admin.governorates.edit", [
            "governorate" => $governorate
        ]);
    }

    public function update(GovernorateRequest $request, Governorate $governorate)
    {
        $attribute = $request->validated();
        
        $governorate->update($attribute);
        return redirect()->route("admin.governorates.index")->with(["", ""]);
    }

    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return redirect()->route("admin.governorates.index");
    }
}