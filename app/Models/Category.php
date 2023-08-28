<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['category'] ?? false) {
            $query->where('name', 'like', '%'. request('category') .'%');
        }
    }
}
