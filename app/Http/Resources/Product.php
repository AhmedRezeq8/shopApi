<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'name' => $this->name,
            'SKU' => $this->SKU,
            'category' => [
                'id'=>$this->category->id,
                'name'=>$this->category->name,
            ],
            'weight' => $this->weight,
            'desc' => $this->desc,
            'thump' => $this->thump,
            'image' => $this->image,
            'IsApproved' => $this->IsApproved,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
