<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoriesRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.categories.subCategories.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $subCategories = SubCategory::select();

            return DataTables::of($subCategories)
                ->addIndexColumn()
                ->addColumn('name', function (SubCategory $subCategory) {
                    foreach(config('translatable.locales') as $locale){
                        return $subCategory->translate($locale)->name;
                    }
                })
                ->addColumn("main_category", function (SubCategory $subCategory) {
                    return view("admin.categories.subCategories.dataTables.subCategory", [
                        "subCategory" => $subCategory
                    ]);
                })
                ->addColumn('actions', "admin.categories.subCategories.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.categories.subCategories.create");
    }

    public function store(SubCategoriesRequest $request)
    {
        $attribute = $request->validated();
        SubCategory::create($attribute);
        return redirect()->route("admin.subCategories.index")->with(["", ""]);
    }

    public function edit(SubCategory $subCategory)
    {
        return view("admin.categories.subCategories.edit", [
            "subCategory" => $subCategory
        ]);
    }

    public function update(SubCategoriesRequest $request, SubCategory $subCategory)
    {
        $attribute = $request->validated();
        $subCategory->update($attribute);
        return redirect()->route("admin.subCategories.index")->with(["", ""]);
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route("admin.subCategories.index");
    }
}