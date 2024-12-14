<?php

namespace App\Http\Controllers;

use App\Models\Region;

class DashboardController extends Controller
{
    public function index()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages/dashboards.index');
    }

    public function regions($city_id)
    {
        return Region::where('city_id', $city_id)->get(['id', 'name_ar']);
    }
}
