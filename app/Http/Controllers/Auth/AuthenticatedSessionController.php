<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // --- INI ADALAH KODE PERBAIKANNYA ---
        $user = Auth::user(); // 1. Gunakan fasad Auth yang lebih eksplisit

        // 2. Cek dulu apakah $user-nya ada, BARU cek is_admin
        if ($user && $user->is_admin) {
            return redirect()->intended('/admin');
        }

        // 3. Jika bukan admin, pakai tujuan default
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

                $user = Auth::user(); // 1. Gunakan fasad Auth yang lebih eksplisit

        // 2. Cek dulu apakah $user-nya ada, BARU cek is_admin
        if ($user && $user->is_admin) {
            return redirect()->intended('/');
        }

        return redirect('/');
    }
}
