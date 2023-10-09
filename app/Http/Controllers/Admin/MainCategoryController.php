<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainCategoriesRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class MainCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.categories.mainCategories.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $mainCategories = MainCategory::select();

            return DataTables::of($mainCategories)
                ->addIndexColumn()
                ->addColumn('name', function (MainCategory $mainCategory) {
                    foreach(config('translatable.locales') as $locale){
                        return $mainCategory->translate($locale)->name;
                    }
                })
                ->addColumn("sub_categories", function (MainCategory $mainCategory) {
                    return view("admin.categories.mainCategories.dataTables.subCategory", [
                        "mainCategory" => $mainCategory
                    ]);
                })
                ->addColumn('actions', "admin.categories.mainCategories.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.categories.mainCategories.create");
    }

    public function store(MainCategoriesRequest $request)
    {
        $attribute = $request->validated();

        // Storage photo of main category
        $file_extension = request('thumbnail')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        Image::make(request("thumbnail"))->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('upload_files/main_categories/' . $file_name));

        $attribute["thumbnail"] = $file_name; 
        MainCategory::create($attribute);
        return redirect()->route("admin.categories.index")->with(["", ""]);
    }

    public function edit(MainCategory $mainCategory)
    {
        return view("admin.categories.mainCategories.edit", [
            "mainCategory" => $mainCategory
        ]);
    }

    public function update(MainCategoriesRequest $request, MainCategory $mainCategory)
    {
        $attribute = $request->validated();

        // Storage photo of barnds
        if($request->thumbnail){
            Storage::disk('public_upload')->delete('/main_categories/' . $mainCategory->thumbnail);
            $file_extension = request('thumbnail')->getClientOriginalExtension();
            $file_name = rand(0, 999999999999999) . '.' . $file_extension;
            Image::make(request("thumbnail"))->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('upload_files/brands/' . $file_name));

            $attribute["thumbnail"] = $file_name;
        }
        
        $mainCategory->update($attribute);
        return redirect()->route("admin.categories.index")->with(["", ""]);
    }

    public function destroy(MainCategory $mainCategory)
    {
        $mainCategory->delete();
        Storage::disk('public_upload')->delete('/main_categories/' . $mainCategory->thumbnail);
        return redirect()->route("admin.categories.index");
    }
}