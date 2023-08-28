<?php

namespace App\Http\Resources;

use App\Http\Controllers\v1\PostController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
            ],
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            'shares' => ShareResource::collection($this->whenLoaded('shares')),
            'comments' => ShareResource::collection($this->whenLoaded('comments')),
            'likes' => ShareResource::collection($this->whenLoaded('likes')),
        ];
    }
}
