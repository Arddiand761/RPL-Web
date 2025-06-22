<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ChapterController;
use App\Models\Comic;

Route::get('/', function () {
    $comics = Comic::latest()->take(8)->get();
    return view('welcome', compact('comics'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show');
Route::get('/chapters/{chapter}', [ChapterController::class, 'show'])->name('chapters.show');
Route::view('/about', 'about')->name('about');

require __DIR__ . '/auth.php';
