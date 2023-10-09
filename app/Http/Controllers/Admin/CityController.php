<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.cities.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $cities = City::with(["governorate"]);

            return DataTables::of($cities)
                ->addIndexColumn()
                ->addColumn('name', function (City $city) {
                    foreach(config('translatable.locales') as $locale){
                        return $city->translate($locale)->name;
                    }
                })
                ->addColumn('governorate', function (City $city) {
                    return view("admin.cities.dataTables.governorate", [
                        "city" => $city
                    ]);
                })
                ->addColumn('actions', "admin.cities.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.cities.create");
    }

    public function store(CityRequest $request)
    {
        $attribute = $request->validated();

        City::create($attribute);
        return redirect()->route("admin.cities.index")->with(["", ""]);
    }

    public function edit(City $city)
    {
        return view("admin.cities.edit", [
            "city" => $city
        ]);
    }

    public function update(CityRequest $request, City $city)
    {
        $attribute = $request->validated();
        
        $city->update($attribute);
        return redirect()->route("admin.cities.index")->with(["", ""]);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route("admin.cities.index");
    }
}