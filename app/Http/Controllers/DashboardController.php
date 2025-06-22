<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic; // <-- Import model Comic

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil beberapa komik untuk ditampilkan di section "Komik Pilihan"
        // Misalnya kita ambil 8 komik terbaru
        $comics = Comic::latest()->take(8)->get();

        // Kirim data comics ke view 'dashboard'
        return view('dashboard', ['comics' => $comics]);
    }
}
