<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    protected $hidden = ['updated_at', 'created_at'];

}
