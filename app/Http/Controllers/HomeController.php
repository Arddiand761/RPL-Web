<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Comic; // tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        $comics = Comic::latest()->take(8)->get();
        $testimonials = Testimonial::latest()->take(5)->get(); // ambil 5 testimoni terbaru
        return view('welcome', compact('comics', 'testimonials'));
    }
}
