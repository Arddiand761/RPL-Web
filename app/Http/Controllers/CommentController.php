<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class CommentController extends Controller
{
    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comic->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }
}
