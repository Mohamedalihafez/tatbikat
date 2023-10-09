<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.offers.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $offers = Offer::select();

            return DataTables::of($offers)
                ->addIndexColumn()
                ->addColumn('name', function (Offer $offer) {
                    foreach(config('translatable.locales') as $locale){
                        return $offer->translate($locale)->name;
                    }
                })
                ->addColumn('actions', "admin.offers.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function create()
    {
        return view("admin.offers.create");
    }

    public function store(OfferRequest $request)
    {
        $attribute = $request->validated();

        Offer::create($attribute);
        return redirect()->route("admin.offers.index")->with(["", ""]);
    }

    public function edit(Offer $offer)
    {
        return view("admin.offers.edit", [
            "offer" => $offer
        ]);
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $attribute = $request->validated();
        
        $offer->update($attribute);
        return redirect()->route("admin.offers.index")->with(["", ""]);
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route("admin.offers.index");
    }
}