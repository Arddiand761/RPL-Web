<x-guest-layout>
    <div>
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-2xl font-bold text-pink-600 mb-1">Masuk ke Akun</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Silakan login untuk melanjutkan.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-pink-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-pink-500 dark:focus:ring-pink-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col gap-2 mt-6">
                <x-primary-button class="w-full justify-center bg-pink-600 hover:bg-pink-700">
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{ route('register') }}"
                    class="text-center text-sm font-semibold text-pink-600 underline rounded-md dark:text-pink-400 hover:text-pink-800 dark:hover:text-pink-300 transition">
                    {{ __('Belum punya akun? Daftar di sini!') }}
                </a>
                @if (Route::has('password.request'))
                    <a class="text-center text-sm text-gray-500 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
