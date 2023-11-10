<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['role_id', 'first_name', 'middle_name', 'last_name', 'email', 'phone', 'city', 'password'];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed',];


    public static function userByRole($role) {
        $dataUser = User::where('role_id','=', $role)->get();
        return sizeof($dataUser)>0 ? $dataUser : null;
    }
}
