<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'attributes' => [
                'message' => $this->message,
                'user' => [
                    'id' => (string)$this->user->id,
                    'name' => $this->user->name,
                ],
                'post_id' => (string)$this->post->id,
            ]
        ];
    }
}
