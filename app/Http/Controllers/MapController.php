<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoordinatesLocationModel;
use App\Models\HydrantInfoModel;

class MapController extends Controller
{

    public function viewMap()
    {
        $coordinates = CoordinatesLocationModel::all();
        return view('map', compact('coordinates')); 
    }

    public function fetchCoordinates()
    {        
        $coordinates = CoordinatesLocationModel::all();
        return response()->json($coordinates);
    }
}
