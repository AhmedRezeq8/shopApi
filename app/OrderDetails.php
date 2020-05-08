<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "order_details";
    protected $fillable = [
        'order_id',
        'product_id',
        'product_price',
        'product_qty',

        'created_at',
        'updated_at',
    ];

    public function order()
    {
        return $this->belongsTo('App\Orders');
    }
    public function product()
    {
        return $this->belongsTo('App\Products');
    }
}
