<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //relationship Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //relationship User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
