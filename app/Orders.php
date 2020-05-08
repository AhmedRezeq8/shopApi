<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'id',
        'user_id',
        'store_id',
        'shipName',
        'shipAddress',
        'amount',
        'tax',
        'deliveryCost',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->belongsTo('App\Users');
    }
    public function stores()
    {
        return $this->belongsTo('App\Stores');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetails');
    }

}
