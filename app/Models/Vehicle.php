<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    protected $fillable = ['owner_id', 'driver_id', 'brand_id', 'plate', 'color', 'type'];
    protected $hidden = ['updated_at', 'created_at'];
}
