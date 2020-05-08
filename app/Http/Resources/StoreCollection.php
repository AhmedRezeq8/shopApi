<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StoreCollection extends ResourceCollection
{

    private $pagination;

    public function __construct($resource)
    {
        $this->pagination = [
            'current_page' => $resource->currentPage(),
            'first_page_url' => $resource->url('1'),
            'last_page' => $resource->lastPage(),
            'last_page_url' => $resource->url($resource->lastPage()),
            'next_page_url' => $resource->nextPageUrl(),
            'per_page' => $resource->perPage(),
            'prev_page_url' => $resource->previousPageUrl(),
            'total' => $resource->count(),


        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return
          [ $this->collection,$this->pagination];
    }

}
