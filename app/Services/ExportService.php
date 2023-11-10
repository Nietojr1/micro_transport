<?php

namespace App\Services;

use App\Models\Dataresponse;
use App\Models\Vehicle;
use Illuminate\Http\Request;


class ExportService
{
    public static function getAllDataExport()
    {
        try {
            $dataVehicle = Vehicle::all();

            if (!empty($dataVehicle)) {
                $queryresponse = Vehicle::dataUserVehicle();
              return  $queryresponse;
                return DataResponse::response(1, $queryresponse);
            } else {
                return DataResponse::response(3, null);
            }
        } catch (\Exception $e) {
            echo $e;
            return DataResponse::response(4, null);
        }
    }

}
