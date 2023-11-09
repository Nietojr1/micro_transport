<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardBrand extends Model
{
    use HasFactory;
    protected $table = 'card_brand';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'origin'];
    protected $hidden = ['updated_at', 'created_at'];
}
