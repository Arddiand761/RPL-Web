<x-guest-layout>
    <div>
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-2xl font-bold text-pink-600 mb-1">Daftar Akun Baru</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Buat akun untuk menikmati semua fitur.</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2 mt-6">
                <x-primary-button class="w-full justify-center bg-pink-600 hover:bg-pink-700">
                    {{ __('Register') }}
                </x-primary-button>
                <a class="text-center text-sm font-semibold text-pink-600 underline rounded-md dark:text-pink-400 hover:text-pink-800 dark:hover:text-pink-300 transition"
                    href="{{ route('login') }}">
                    {{ __('Sudah punya akun? Masuk di sini!') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
