<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dataresponse;
use App\Services\UserService;

class UserController extends Controller
{
    public function allUsers()
    {
        return User::all();
    }

    public function postUserNew(Request $request)
    {
        if (isset($request)) {
            return UserService::postUserNew($request);
        }else{
            return DataResponse::response(3,null);
        }
    }

    public function userById($code)
    {
        if (isset($code)) {
            return User::find($code);
        }else{
            return Dataresponse::response(3,null);
        }
    }

    public function allUserByRole($role)
    {
        if (isset($role)) {
            return User::userByRole($role);
        }else{
            return Dataresponse::response(3,null);
        }
    }
}
