<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author', // tambahkan ini
        'genre',
        'status',
        'thumbnail',
        'sinopsis',
    ];

    protected $casts = [
        'genre' => 'array',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
