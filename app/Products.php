<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = [
        'name',
        'SKU',
        'category_id',
        'weight',
        'desc',
        'thump',
        'image',
        'IsApproved',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function storeProducts()
    {
        return $this->hasMany('App\StoreProducts');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetails');
    }

}
