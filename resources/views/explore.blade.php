<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4">
        <!-- Search Bar -->
        <form method="GET" action="{{ route('explore') }}" class="flex flex-col items-center mb-6">
            <div class="flex w-full max-w-lg items-center bg-pink-50 rounded-xl px-4 py-2 shadow">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                    class="flex-1 bg-transparent outline-none border-0 text-gray-800 dark:text-gray-100 placeholder-gray-400">
                <button type="submit" class="ml-2">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" />
                        <line x1="16.65" y1="16.65" x2="21" y2="21" stroke="currentColor" />
                    </svg>
                </button>
            </div>
            <!-- Genre Filter -->
            <div class="flex flex-wrap gap-3 mt-4">
                @foreach ($genres as $genre)
                    <a href="{{ route('explore', array_merge(request()->except('page'), ['genre' => $genre])) }}"
                        class="px-4 py-1 rounded-md font-semibold text-white bg-pink-400 hover:bg-pink-600 transition
                            {{ request('genre') === $genre ? 'ring-2 ring-pink-600' : '' }}">
                        {{ $genre }}
                    </a>
                @endforeach
            </div>
        </form>

        <!-- Komik List -->
        <div class="mt-10">
            <h2 class="font-bold text-lg mb-4">Hasil Komik</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @forelse ($comics as $comic)
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-3 flex flex-col items-center shadow">
                        <img src="{{ asset('storage/' . $comic->thumbnail) }}" alt="{{ $comic->title }}"
                            class="object-cover w-full h-32 rounded mb-2">
                        <div class="font-semibold text-gray-800 dark:text-gray-100">{{ $comic->title }}</div>
                        <div class="flex flex-wrap gap-1 mt-1">
                            @foreach ($comic->genre ?? [] as $g)
                                <span
                                    class="px-2 py-0.5 text-xs rounded bg-pink-100 text-pink-700">{{ $g }}</span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-400">Tidak ada komik ditemukan.</div>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $comics->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
