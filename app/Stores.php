<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{    protected $table = "stores";
    protected $fillable = [
        'user_id',
        'Name',
        'Il_id',
        'Ilce_id',
        'Mahalle_id',
        'sokakcadde_id',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->belongsTo('App\Users');
    }

    public function storeProducts()
    {
        return $this->hasMany('App\StoreProducts');
    }

}
