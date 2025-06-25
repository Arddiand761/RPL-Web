<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ChapterController;
use App\Models\Comic;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show');
Route::get('/chapters/{chapter}', [ChapterController::class, 'show'])->name('chapters.show');
Route::view('/about', 'about')->name('about');
Route::post('/comics/{comic}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::delete('/comics/{comic}', [ComicController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('comics.destroy');
Route::post('/comics/{comic}/bookmark', [ComicController::class, 'bookmark'])->middleware('auth')->name('comics.bookmark');

Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/explore', [ComicController::class, 'explore'])->name('explore');
Route::get('/collection', [ComicController::class, 'collection'])->middleware('auth')->name('collection');

require __DIR__ . '/auth.php';
