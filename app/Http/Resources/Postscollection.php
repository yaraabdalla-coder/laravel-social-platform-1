<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Postscollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'posts' => PostsResource::collection($this->collection),

            'meta' => [
                'total posts' => $this->collection->count(),
            ],
        ];
    }
}