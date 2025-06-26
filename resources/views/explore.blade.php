<x-app-layout>
    <div class="max-w-5xl px-4 py-10 mx-auto">
        <!-- Search Bar -->
        <form method="GET" action="{{ route('explore') }}" class="flex flex-col items-center mb-6">
            <div class="flex w-full max-w-lg items-center bg-[#FF6900] bg-opacity-10 rounded-xl px-4 py-2 shadow">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                    class="flex-1 text-gray-800 placeholder-gray-400 bg-transparent border-0 outline-none dark:text-gray-100">
                <button type="submit" class="ml-2">
                    <svg class="w-6 h-6 text-[#FF6900]" fill="none" stroke="currentColor" stroke-width="2"
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
                        class="px-4 py-1 rounded-md font-semibold text-white bg-[#FF6900] hover:bg-white hover:text-[#FF6900] border-2 border-[#FF6900] transition
                            {{ request('genre') === $genre ? 'ring-2 ring-[#FF6900]' : '' }}">
                        {{ $genre }}
                    </a>
                @endforeach
            </div>
        </form>

        <!-- Komik List -->
        <div class="mt-10">
            <h2 class="mb-4 text-lg font-bold">Hasil Komik</h2>
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4">
                @forelse ($comics as $comic)
                    <a href="{{ route('comics.show', $comic) }}" class="w-full group">
                        <div
                            class="flex flex-col h-full p-3 transition bg-white rounded-lg shadow cursor-pointer dark:bg-gray-800 hover:shadow-lg">
                            <img src="{{ asset('storage/' . $comic->thumbnail) }}" alt="{{ $comic->title }}"
                                class="object-cover w-full h-32 mb-2 rounded">
                            <h3
                                class="font-semibold text-gray-800 truncate group-hover:text-[#FF6900] dark:text-gray-100 text-lg mb-1">
                                {{ $comic->title }}</h3>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-300">{{ $comic->chapters()->count() }}
                                chapter • {{ $comic->author }}</p>
                            <div class="flex flex-wrap gap-1 mb-2">
                                @foreach ($comic->genre ?? [] as $g)
                                    <span
                                        class="px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900] font-semibold">{{ $g }}</span>
                                @endforeach
                            </div>
                            <span
                                class="inline-block mt-1 px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900] font-semibold w-max">{{ $comic->status }}</span>
                            <p class="flex-1 mt-2 text-xs text-gray-400 dark:text-gray-500">
                                {{ Str::limit(strip_tags($comic->sinopsis), 80) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="text-center text-gray-400 col-span-full">Tidak ada komik ditemukan.</div>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $comics->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
