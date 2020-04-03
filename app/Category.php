<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name',
        'SKU',
        'created_at',
        'updated_at',
    ];
    public function products()
    {
        return $this->hasMany('App\Products');
    }
}
