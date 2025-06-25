<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_id', 'comic_id'];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
