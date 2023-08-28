<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
