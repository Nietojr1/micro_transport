<?php

namespace App\Http\Controllers;

use App\Models\Dataresponse;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function allRoles()
    {
        return Role::all();
    }

    public function roleById($code)
    {
        if (isset($code)) {
            return Role::find($code);
        }else{
            return Dataresponse::response(3,null);
        }
    }
}
