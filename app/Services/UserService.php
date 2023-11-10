<?php

namespace App\Services;

use App\Models\Dataresponse;
use App\Models\User;
use Illuminate\Http\Request;


class UserService
{

    public static function postUserNew(Request $request)
    {
        try {
            $newUser =  new User();
            $newUser->role_id    = $request->role_id;
            $newUser->id_card    = $request->id_card;
            $newUser->first_name = $request->first_name;
            $newUser->middle_name= $request->middle_name;
            $newUser->last_name  = $request->last_name;
            $newUser->address    = $request->address;
            $newUser->email      = $request->email;
            $newUser->phone      = $request->phone;
            $newUser->city       = $request->city;
            $newUser->password   = bcrypt($request->password);
            $newUser->save();
            return DataResponse::response(1, $newUser);
        } catch (\Throwable $th) {
            return DataResponse::response(3, null);
        }
    }

}
