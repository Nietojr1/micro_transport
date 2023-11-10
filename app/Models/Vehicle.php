<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    protected $fillable = ['owner_id', 'driver_id', 'brand_id', 'plate', 'color', 'type'];
    protected $hidden = ['updated_at', 'created_at'];

    public static function dataUserVehicle()
    {
        $allVehicle = Vehicle::join('users as owners', 'owners.id', '=', 'vehicle.owner_id')
            ->join('users as drivers', 'drivers.id', '=', 'vehicle.driver_id')
            ->join('card_brand', 'card_brand.id', '=', 'vehicle.brand_id')
            ->select(
                'vehicle.plate',
                'card_brand.name as brand_name',
                'card_brand.origin as brand_origin',
                DB::raw("CONCAT_WS(' ', owners.first_name, owners.middle_name, owners.last_name) as owner_full_name"),
                DB::raw("CONCAT_WS(' ', drivers.first_name, drivers.middle_name, drivers.last_name) as driver_full_name")
            )
            ->get();

        return sizeof($allVehicle) > 0 ? $allVehicle : [];
    }



}
