<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comic_id',
        'user_id',
        'content',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
