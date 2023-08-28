<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'user_id' => (string)$this->user_id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'user' => [
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ],
                'category' => [
                    'id' => (string)$this->category_id,
                    'name' => $this->category->name,
                ],
                'comments' => CommentResource::collection($this->whenLoaded('comments')),
                'likes' => LikeResource::collection($this->whenLoaded('likes')),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
