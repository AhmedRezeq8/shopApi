<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name',
        'user_type_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'fBase_id',
        'created_at',
        'updated_at',
    ];
    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }
    public function carts()
    {
        return $this->hasMany('App\Carts');
    }
}
