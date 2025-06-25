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
    public function explore(Request $request)
    {
        $genres = [
            'Fantasy',
            'Sci-Fi',
            'Romance',
            'Horror',
            'Comedy',
            'Action',
            'Slice of Life'
        ];

        $query = \App\Models\Comic::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre')) {
            $query->whereJsonContains('genre', $request->genre);
        }

        $comics = $query->latest()->paginate(12);

        return view('explore', compact('genres', 'comics'));
    }
    public function bookmark(Comic $comic)
    {
        $user = auth()->user();
        $bookmark = $user->bookmarks()->where('comic_id', $comic->id)->first();

        if ($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Bookmark dihapus.');
        } else {
            $user->bookmarks()->create(['comic_id' => $comic->id]);
            return back()->with('success', 'Komik berhasil di-bookmark.');
        }
    }
    public function collection()
    {
        $comics = auth()->user()->bookmarks()->with('comic')->get()->pluck('comic');
        return view('collection', compact('comics'));
    }
}
