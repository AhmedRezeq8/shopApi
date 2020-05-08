<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProducts extends Model
{
    protected $table = "store_products";
    protected $fillable = [
        'id',
        'store_id',
        'product_id',
        'productPrice',
        'productDiscount',
        'productStock',
        'category_id',

        'created_at',
        'updated_at',
    ];
    public function getRouteKeyName()
    {
        return 'store_id';
    }

    public function store()
    {
        return $this->belongsTo('App\Stores');
    }

    public function product()
    {
        return $this->belongsTo('App\Products');
    }
    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function carts()
    {
        return $this->hasMany('App\Carts');
    }
}
