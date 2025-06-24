<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic; // <-- Import model Comic


class ComicController extends Controller
{
    // Method untuk halaman utama (daftar semua komik)
    public function index(Request $request)
    {
        $query = Comic::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $comics = $query->paginate(12);
        return view('comics.index', compact('comics'));
    }

    // Method untuk halaman detail satu komik
    public function show(Comic $comic)
    {
        // Laravel otomatis akan mencari komik berdasarkan ID di URL (Route Model Binding)
        // Kita hanya perlu mengirimkan data komik tersebut ke view
        return view('comics.show', ['comic' => $comic]);
    }
    public function destroy(Comic $comic)
    {
        // Hanya admin yang boleh hapus
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }
        $comic->delete();
        return redirect()->route('comics.index')->with('success', 'Komik berhasil dihapus.');
    }
}
