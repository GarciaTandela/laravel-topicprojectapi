<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);

        return
        [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at->diffForhumans(),
            'updated_at' => $this->updated_at->diffForhumans(),
            'user' => $this->user


        ];

    }
}
