<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        $ads = Ad::whereYear("created_at", now()->year)->select(
            DB::raw("DATE_FORMAT(created_at, '%M') as month"),
            DB::raw("YEAR(created_at) as year"),
            DB::raw("COUNT(id) as total_ads"),
        )->groupBy('month')->get();

        return view("admin.index", [
            "ads" => $ads
        ]);
    }

    public function get_total_ads(Request $request)
    {
        if($request->ajax()) {
            $ads = Ad::whereYear("created_at", request("year"))->select(
                DB::raw("MONTH(created_at) as month"),
                DB::raw("YEAR(created_at) as year"),
                DB::raw("COUNT(id) as total_ads"),
            )->groupBy('month')->get();
    
            // return $ads;
        }
    }
}