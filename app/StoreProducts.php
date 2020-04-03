<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProducts extends Model
{
    protected $table = "store_products";
    protected $fillable = [
        'store_id',
        'product_id',
        'productPrice',
        'productDiscount',
        'productStock',
        'created_at',
        'updated_at',
    ];

    public function store()
    {
        return $this->belongsTo('App\Stores');
    }

    public function product()
    {
        return $this->belongsTo('App\Products');
    }

}
