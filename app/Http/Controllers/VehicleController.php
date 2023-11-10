<?php

namespace App\Http\Controllers;

use App\Models\Dataresponse;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function allVehicles()
    {
        return Vehicle::all();
    }

    public function vehicleByPlate($code)
    {
        if (isset($code)) {
            return Vehicle::find($code);
        }else{
            return Dataresponse::response(3,null);
        }
    }

    public function vehicleNew(Request $request)
    {
        if (isset($request)) {
            return VehicleService::vehicleNew($request);
        }else{
            return Dataresponse::response(3,null);
        }
    }
}
