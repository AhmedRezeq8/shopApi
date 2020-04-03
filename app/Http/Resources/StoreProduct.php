<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\StoreProducts;
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

            'store' =>$this->store->Name,
        //   'product' =>$this->product['name'],
          'product' =>$this->product->name,


            // for details uncomment code below
            //   'store' => [
            //     'id' => $this->store->id,
            //     'name' => $this->store->Name,
            // ],

            // 'product' => [
            //     'id' => $this->product['id'],
            //     'name' => $this->product['name'],
            // ],
            'productPrice' => $this->productPrice,
            'productDiscount' => $this->productDiscount,
            'productStock' => $this->productStock,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
