<x-guest-layout>
    <div>
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-2xl font-bold text-[#FF6900] mb-1">Masuk ke Akun</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Silakan login untuk melanjutkan.</p>
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
            <div class="relative mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full pr-10 mt-1" type="password" name="password" required
                    autocomplete="current-password" />
                <button type="button" onclick="togglePassword()" tabindex="-1"
                    class="absolute right-3 top-9 text-gray-400 hover:text-[#FF6900] focus:outline-none">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" class="hidden w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.293-3.95M6.634 6.634A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.293 5.95M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>
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
                <x-primary-button
                    class="w-full justify-center bg-[#FF6900] hover:bg-white hover:text-[#FF6900] border-2 border-[#FF6900] text-white transition">
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{ route('register') }}"
                    class="text-center text-sm font-semibold text-[#FF6900] underline rounded-md hover:text-white hover:bg-[#FF6900] transition">
                    {{ __('Belum punya akun? Daftar di sini!') }}
                </a>
                @if (Route::has('password.request'))
                    <a class="text-center text-sm text-gray-500 underline rounded-md hover:text-[#FF6900] transition"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eye = document.getElementById('eyeIcon');
            const eyeOff = document.getElementById('eyeOffIcon');
            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.add('hidden');
                eyeOff.classList.remove('hidden');
            } else {
                input.type = 'password';
                eye.classList.remove('hidden');
                eyeOff.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
