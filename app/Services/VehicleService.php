<?php

namespace App\Services;

use App\Models\Dataresponse;
use App\Models\Vehicle;
use Illuminate\Http\Request;


class VehicleService
{

    public static function vehicleNew(Request $request)
    {
        try {
            $newVehicle =  new Vehicle();
            $newVehicle->owner_id   = $request->owner_id;
            $newVehicle->driver_id  = $request->driver_id;
            $newVehicle->brand_id   = $request->brand_id;
            $newVehicle->plate      = $request->plate;
            $newVehicle->color      = $request->color;
            $newVehicle->type       = $request->type;
            $newVehicle->save();
            return DataResponse::response(1, $newVehicle);
        } catch (\Throwable $th) {
            return DataResponse::response(3, null);
        }
    }

}
