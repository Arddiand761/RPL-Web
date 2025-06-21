<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic; // <-- Import model Comic


class ComicController extends Controller
{
    // Method untuk halaman utama (daftar semua komik)
    public function index()
    {
        // Ambil semua data komik, urutkan dari yang terbaru, lalu kirim ke view
        $comics = Comic::latest()->paginate(12); // paginate agar tidak berat jika komik banyak
        return view('comics.index', ['comics' => $comics]);
    }

    // Method untuk halaman detail satu komik
    public function show(Comic $comic)
    {
        // Laravel otomatis akan mencari komik berdasarkan ID di URL (Route Model Binding)
        // Kita hanya perlu mengirimkan data komik tersebut ke view
        return view('comics.show', ['comic' => $comic]);
    }
}
