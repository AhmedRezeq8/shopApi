<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{    protected $table = "stores";
    protected $fillable = [
        'user_id',
        'name',
        'Il_id',
        'Ilce_id',
        'Mahalle_id',
        'sokakcadde_id',
        'created_at',
        'updated_at',
        'min_order_price',
        'time_order	',
        'rank',
        'img',
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function storeProducts()
    {
        return $this->hasMany('App\StoreProducts');
    }

}
