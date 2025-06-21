<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm dark:bg-gray-950 dark:border-gray-800">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center shrink-0">
                    <a href="/">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-xl font-bold text-white bg-red-500 rounded-full">
                            K
                        </div>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-900 focus:outline-none focus:text-gray-900 dark:text-gray-200 dark:hover:text-white">
                        About Us
                    </a>
                    <a href="/"
                        class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->is('/') ? 'border-indigo-400 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-200' }} hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Explore
                    </a>
                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 dark:text-gray-200 dark:hover:text-white">
                        Collection
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-semibold text-gray-700 transition bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 ml-4 text-sm font-semibold text-white transition bg-gray-800 rounded-md hover:bg-gray-900 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600">
                        Register
                    </a>
                @endguest

                @auth
                    <!-- Toggle Dark Mode -->
                    <button id="darkModeToggle"
                        class="flex items-center px-3 py-2 mr-2 transition bg-gray-200 rounded-full dark:bg-gray-800 focus:outline-none"
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
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none dark:bg-gray-900 dark:text-gray-200 dark:hover:text-white">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @if (Auth::user()->is_admin)
                                <x-dropdown-link href="/admin">Admin Panel</x-dropdown-link>
                            @endif
                            <x-dropdown-link :href="route('dashboard')">Dashboard</x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    </div>
</nav>

<script>
    // Toggle dark mode
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
        // Load preference from localStorage
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    });
</script>
