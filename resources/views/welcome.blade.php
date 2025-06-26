<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POJOK KOMIK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logoKomik.svg') }}">
</head>

<body class="flex flex-col min-h-screen text-gray-900 bg-gray-50 dark:bg-gray-900 dark:text-gray-100">
    <!-- Navbar -->
    <header class="w-full bg-white border-b border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
        <nav class="flex items-center justify-between h-16 max-w-6xl px-4 mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logoKomik.svg') }}" alt="Logo"
                    class="object-contain w-10 h-10 drop-shadow-lg" />
                <span class="hidden text-2xl font-extrabold tracking-tight text-[#FF6900] sm:inline">POJOK KOMIK</span>
            </a>
            <!-- Menu -->
            <div class="flex items-center gap-8">
                <a href="{{ route('about') }}"
                    class="text-base font-semibold text-[#FF6900] transition hover:underline dark:text-[#FF6900]">About
                    Us</a>
                <a href="#"
                    class="text-base font-semibold text-[#FF6900] transition hover:underline dark:text-[#FF6900]">Explore</a>
                <a href="#"
                    class="text-base font-semibold text-[#FF6900] transition hover:underline dark:text-[#FF6900]">Collection</a>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-3">
                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle"
                    class="flex items-center px-3 py-2 transition bg-gray-200 rounded-full dark:bg-gray-700 focus:outline-none"
                    title="Toggle dark mode">
                    <svg id="sunIcon" class="w-5 h-5 text-yellow-500 dark:hidden" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71m16.97 0l-.71-.71M4.05 4.93l-.71-.71M21 12h-1M4 12H3m9 5a5 5 0 100-10 5 5 0 000 10z" />
                    </svg>
                    <svg id="moonIcon" class="hidden w-5 h-5 text-gray-300 dark:inline" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                    </svg>
                </button>
                <a href="{{ route('login') }}"
                    class="px-5 py-1.5 font-semibold rounded shadow transition
                           bg-[#FF6900] text-white border-2 border-[#FF6900]
                           hover:bg-white hover:text-[#FF6900]">Login</a>
                <a href="{{ route('register') }}"
                    class="px-5 py-1.5 font-semibold rounded shadow transition
                           bg-white text-[#FF6900] border-2 border-[#FF6900]
                           hover:bg-[#FF6900] hover:text-white">Register</a>
                <a href="https://forms.gle/CtPHhwkGa9NMy9do6" id="admin-register-btn"
                    class="px-5 py-1.5 font-semibold rounded shadow transition
                           bg-[#FF6900] text-white border-2 border-[#FF6900]
                           hover:bg-white hover:text-[#FF6900]"
                    target="_blank">Daftar Admin</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="w-full py-16 bg-white shadow-sm dark:bg-gray-900">
        <div class="max-w-4xl px-4 mx-auto text-center">
            <h1 class="mb-4 text-4xl font-extrabold text-gray-900 sm:text-5xl dark:text-white">
                Selamat Datang di <span class="text-[#FF6900]">POJOK KOMIK</span>
            </h1>
            <p class="mb-6 text-lg text-gray-600 sm:text-xl dark:text-gray-300">
                Temukan, baca, dan nikmati ribuan komik gratis pilihan terbaik dari para kreator Indonesia!
            </p>
            <a href="{{ route('login') }}"
                class="inline-block px-8 py-3 text-lg font-bold text-white transition rounded-lg shadow-lg border-2 border-[#FF6900] bg-[#FF6900] hover:bg-white hover:text-[#FF6900]">
                Mulai Baca Sekarang
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="w-full flex justify-center py-10 min-h-[calc(100vh-4rem)]">
        <div class="w-full max-w-6xl mx-auto">
            <!-- Komik Gratis Pilihan -->
            <div class="flex items-center justify-between px-2 mb-6">
                <h2 class="text-2xl font-extrabold text-[#FF6900] dark:text-[#FF6900] tracking-tight">Komik Gratis
                    Pilihan
                </h2>
                <a href="{{ route('login') }}"
                    class="text-sm font-semibold text-[#FF6900] transition hover:underline dark:text-[#FF6900]">Lihat
                    Semua</a>
            </div>
            <div class="grid grid-cols-2 gap-8 px-2 sm:grid-cols-3 md:grid-cols-4">
                @forelse ($comics as $comic)
                    <a href="{{ route('login') }}" class="group">
                        <div
                            class="overflow-hidden transition-transform duration-300 transform bg-white rounded-lg shadow-md hover:-translate-y-1 dark:bg-gray-800">
                            <img src="{{ asset('storage/' . $comic->thumbnail) }}" alt="{{ $comic->title }}"
                                class="object-cover w-full h-48">
                            <div class="p-4">
                                <h3
                                    class="font-semibold text-gray-800 truncate group-hover:text-blue-600 dark:text-gray-100">
                                    {{ $comic->title }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                    {{ $comic->chapters()->count() }} chapter • {{ $comic->author }}
                                </p>
                                <div class="flex flex-wrap gap-1 mt-2">
                                    @foreach ($comic->genre ?? [] as $genre)
                                        <span
                                            class="px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900]">{{ $genre }}
                                        </span>
                                    @endforeach
                                </div>
                                <span
                                    class="inline-block mt-2 px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900]">
                                    {{ $comic->status }}
                                </span>
                                <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                                    {{ Str::limit(strip_tags($comic->sinopsis), 80) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-gray-500 col-span-full dark:text-gray-400">Belum ada komik untuk
                        ditampilkan.
                    </p>
                @endforelse
            </div>
    </main>

    <!-- Footer -->
    <footer
        class="w-full py-10 mt-10 bg-white border-t border-gray-200 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700">
        <div class="max-w-6xl px-4 mx-auto">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                <!-- Kolom Testimoni -->
                <div>
                    <h2 class="mb-4 text-xl font-bold text-[#FF6900] dark:text-[#FF6900]">Kata Mereka Tentang Web Ini
                    </h2>
                    <div class="flex flex-col gap-4">
                        @forelse ($testimonials ?? [] as $comment)
                            <div class="p-4 text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-100">
                                <div class="mb-1 italic">"{{ Str::limit($comment->content, 100) }}"</div>
                                <div class="mt-2 text-xs text-gray-500 dark:text-gray-300">
                                    — {{ $comment->name ?? 'Anonim' }}, <span
                                        class="italic">{{ $comment->comic_title ?? '' }}</span>
                                </div>
                            </div>
                        @empty
                            <div
                                class="p-4 text-center text-gray-600 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                                Belum ada testimoni.
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Kolom Form Testimoni -->
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Tulis Testimoni Anda</h3>
                    @if (session('success'))
                        <div class="p-2 mb-3 text-sm text-green-700 bg-green-100 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('testimonials.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block mb-1 text-sm font-medium" for="name">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-3 py-2 bg-white rounded dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:border-pink-400">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium" for="comic_title">Judul Komik</label>
                            <input type="text" id="comic_title" name="comic_title" required
                                class="w-full px-3 py-2 bg-white rounded dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:border-pink-400">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium" for="content">Testimoni</label>
                            <textarea id="content" name="content" rows="3" required
                                class="w-full px-3 py-2 bg-white rounded dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:border-pink-400"></textarea>
                        </div>
                        <button type="submit"
                            class="px-6 py-2 bg-[#FF6900] text-white rounded font-semibold hover:bg-white hover:text-[#FF6900] border-2 border-[#FF6900] transition w-full md:w-auto">
                            Kirim Testimoni
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-12 text-sm text-center text-gray-400 dark:text-gray-500">
                &copy; {{ date('Y') }} POJOK KOMIK. All rights reserved.
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('darkModeToggle');
            const html = document.documentElement;
            const sunIcon = document.getElementById('sunIcon');
            const moonIcon = document.getElementById('moonIcon');

            // Cek preferensi awal
            if (localStorage.getItem('theme') === 'dark' ||
                (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                html.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }

            toggle.addEventListener('click', function() {
                html.classList.toggle('dark');
                const isDark = html.classList.contains('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                sunIcon.classList.toggle('hidden', isDark);
                moonIcon.classList.toggle('hidden', !isDark);
            });
        });
    </script>
</body>

</html>
