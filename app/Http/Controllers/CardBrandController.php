<?php

namespace App\Http\Controllers;

use App\Models\CardBrand;
use Illuminate\Http\Request;

class CardBrandController extends Controller
{
    public function allBrand()
    {
        return CardBrand::all();
    }
}
