<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'store' => $this->store->name,
            'storeid' => $this->store->id,
            'cat_id' => $this->category->id,
            'cat_name' => $this->category->name,
            'cat_img' => $this->category->img,

            // 'product' => [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'product_SKU' => $this->product->SKU,
            'product_weight' => $this->product->weight,
            'product_desc' => $this->product->desc,
            'product_thump' => $this->product->thump,
            'product_image' => $this->product->image,
            'product_IsApproved' => $this->product->IsApproved,
            'product_created_at' => $this->product->created_at,
            'product_updated_at' => $this->product->updated_at,

            // ],
            'productPrice' => $this->productPrice,
            'productDiscount' => $this->productDiscount,
            'productStock' => $this->productStock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
