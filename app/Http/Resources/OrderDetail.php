<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetail extends JsonResource
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

           'order_id' => $this->order->id,
        //    'order_id' => [
        //     'id'=>$this->orders->id,
        //     'name'=>$this->category->name,
        // ],
            'product_id' => $this->product->name,
            'product_price' => $this->product_price,

            'product_qty' => $this->product_qty,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
