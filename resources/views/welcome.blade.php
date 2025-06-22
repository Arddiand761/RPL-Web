<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web Comic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-0 items-center min-h-screen flex-col">
    <!-- Navbar -->
    <header class="w-full shadow-sm bg-white dark:bg-[#161615] border-b border-gray-200 dark:border-[#3E3E3A]">
        <nav class="flex items-center justify-between h-16 max-w-6xl px-4 mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logoKomik.svg') }}" alt="Logo" class="object-contain w-10 h-10" />
            </a>
            <!-- Menu -->
            <div class="flex items-center gap-8">
                <a href="#"
                    class="text-base font-semibold text-gray-800 transition hover:text-red-600 dark:text-gray-100 dark:hover:text-red-400">About
                    Us</a>
                <a href="#"
                    class="text-base font-semibold text-gray-800 transition hover:text-red-600 dark:text-gray-100 dark:hover:text-red-400">Explore</a>
                <a href="#"
                    class="text-base font-semibold text-gray-800 transition hover:text-red-600 dark:text-gray-100 dark:hover:text-red-400">Collection</a>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-3">
                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle"
                    class="flex items-center px-3 py-2 transition bg-gray-200 rounded-full dark:bg-gray-800 focus:outline-none"
                    title="Toggle dark mode">
                    <svg id="sunIcon" class="w-5 h-5 text-yellow-500 dark:hidden" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71m16.97 0l-.71-.71M4.05 4.93l-.71-.71M21 12h-1M4 12H3m9 5a5 5 0 100-10 5 5 0 000 10z" />
                    </svg>
                    <svg id="moonIcon" class="hidden w-5 h-5 text-gray-800 dark:inline" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                    </svg>
                </button>
                <a href="{{ route('login') }}"
                    class="px-5 py-1.5 font-semibold rounded bg-gray-100 border border-gray-300 hover:bg-gray-200 dark:bg-[#232323] dark:text-[#EDEDEC] dark:border-[#3E3E3A] dark:hover:bg-[#323232] transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-5 py-1.5 font-semibold rounded bg-[#fff2f2] border border-red-200 text-red-600 hover:bg-red-50 dark:bg-[#1D0002] dark:text-red-400 dark:border-[#3E3E3A] dark:hover:bg-[#2a0003] transition">
                    Register
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="w-full flex justify-center py-10 bg-[#FDFDFC] dark:bg-[#0a0a0a] min-h-[calc(100vh-4rem)]">
        <div class="w-full max-w-6xl bg-white dark:bg-[#161615] rounded-xl shadow p-8 mt-6">
            <!-- Komik Gratis Pilihan -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Komik Gratis Pilihan</h2>
                <a href="#"
                    class="text-sm font-semibold text-red-600 transition hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Lihat
                    Semua</a>
            </div>
            <div class="grid grid-cols-2 gap-6 mb-8 sm:grid-cols-3 md:grid-cols-4">
                @forelse ($comics as $comic)
                    <div
                        class="flex flex-col overflow-hidden transition bg-white rounded-lg shadow dark:bg-gray-800 hover:shadow-lg">
                        <img src="{{ asset('storage/' . $comic->thumbnail) }}" alt="{{ $comic->title }} "
                            class="object-cover w-full h-48">
                        <div class="flex flex-col justify-between flex-1 p-3">
                            <div>
                                <h3 class="mb-1 text-base font-semibold text-gray-800 dark:text-gray-100">
                                    {{ $comic->title }}
                                </h3>
                                <div class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-300">
                                    <svg class="inline-block w-4 h-4" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path
                                            d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                    </svg>
                                    {{ $comic->reads ?? 0 }} dibaca &bull; {{ $comic->author ?? 'Penulis' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full dark:text-gray-300">Belum ada komik untuk
                        ditampilkan.
                    </p>
                @endforelse
            </div>
            <!-- Kata Mereka Tentang Seri Ini -->
            <div>
                <h2 class="mb-4 text-lg font-bold text-gray-800 dark:text-gray-100">Kata Mereka Tentang Seri Ini</h2>
                <div class="grid grid-cols-2 gap-6">
                    <div
                        class="bg-red-200 dark:bg-[#3E3E3A] h-32 rounded-lg flex items-center justify-center text-gray-700 dark:text-gray-100 font-medium text-center shadow">
                        Testimoni pembaca di sini...
                    </div>
                    <div
                        class="bg-red-200 dark:bg-[#3E3E3A] h-32 rounded-lg flex items-center justify-center text-gray-700 dark:text-gray-100 font-medium text-center shadow">
                        Testimoni pembaca di sini...
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Dark mode toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('darkModeToggle');
            if (!toggle) return;
            toggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });
            // Set dark mode dari localStorage saat load
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
</body>

</html>
