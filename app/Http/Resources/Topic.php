<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Post as PostResource;

class Topic extends JsonResource
{

    public function toArray($request)
    {
        //return parent::toArray($request);

        return
        [
            'id' => $this->id,
            'title' => $this->title,
            'created_at' => $this->created_at->diffForhumans(),
            'updated_at' => $this->updated_at->diffForhumans(),
            'posts' => PostResource::collection($this->posts),
            'user' => $this->user,

        ];
    }

}
