<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter; // <-- Import model Chapter


class ChapterController extends Controller
{
    // Method untuk menampilkan satu chapter
    public function show(Chapter $chapter)
    {
        // Laravel otomatis mencari chapter berdasarkan ID di URL
        return view('chapters.show', ['chapter' => $chapter]);
    }
}
