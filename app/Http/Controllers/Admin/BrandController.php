<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.brands.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $brands = Brand::select();

            return DataTables::of($brands)
                ->addIndexColumn()
                ->addColumn('name', function (Brand $brand) {
                    foreach(config('translatable.locales') as $locale){
                        return $brand->translate($locale)->name;
                    }
                })
                ->addColumn('actions', "admin.brands.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.brands.create");
    }

    public function store(BrandRequest $request)
    {
        $attribute = $request->validated();

        // Storage photo of barnds
        $file_extension = request('thumbnail')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        Image::make(request("thumbnail"))->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('upload_files/brands/' . $file_name));

        $attribute["thumbnail"] = $file_name; 
        Brand::create($attribute);
        return redirect()->route("admin.brands.index");
    }

    public function edit(Brand $brand)
    {
        return view("admin.brands.edit", [
            "brand" => $brand
        ]);
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $attribute = $request->validated();

        // Storage photo of barnds
        if($request->thumbnail){
            Storage::disk('public_upload')->delete('/brands/' . $brand->thumbnail);
            $file_extension = request('thumbnail')->getClientOriginalExtension();
            $file_name = rand(0, 999999999999999) . '.' . $file_extension;
            Image::make(request("thumbnail"))->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('upload_files/brands/' . $file_name));

            $attribute["thumbnail"] = $file_name;
        }
        
        $brand->update($attribute);
        return redirect()->route("admin.brands.index")->with(["", ""]);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        Storage::disk('public_upload')->delete('/brands/' . $brand->thumbnail);
        return redirect()->route("admin.brands.index");
    }
}