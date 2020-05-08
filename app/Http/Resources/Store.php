<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Store extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'Il_id' => $this->Il_id,
            'Ilce_id' => $this->Ilce_id,
            'Mahalle_id' => $this->Mahalle_id,
            'sokakcadde_id' => $this->sokakcadde_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'min_order_price' => $this->min_order_price,
            'time_order' => $this->time_order,
            'rank' => $this->rank,
            'img' => $this->img,
        ];
    }
}
