<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
        use HasFactory;

    protected $fillable = [
        'comic_id',
        'title',
        'images',
    ];

    // Casts ini sangat penting untuk kolom 'images'
    protected $casts = [
        'images' => 'array',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
