<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = "carts";
    protected $fillable = [
        'id',
        'user_id',
        'storeProduct_id',
        'qty',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
    public function storeProducts()
    {
        return $this->belongsTo('App\StoreProducts', 'storeProduct_id');
    }

}
