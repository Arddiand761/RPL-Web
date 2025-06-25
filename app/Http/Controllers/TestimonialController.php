<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'comic_title' => 'required|max:100',
            'content' => 'required|max:255',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'comic_title' => $request->comic_title,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Testimoni berhasil dikirim!');
    }

    public function index()
    {
        // Menampilkan semua testimoni, bisa diubah sesuai kebutuhan
        $testimonials = \App\Models\Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }
}
