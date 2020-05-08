<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{ protected $table = "user_types";
    protected $fillable = [

        'name',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
