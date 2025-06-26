<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Komik Gratis Pilihan</h2>
                    <a href="{{ route('comics.index') }}"
                        class="text-sm font-semibold text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Lihat
                        Semua</a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4">
                    @forelse ($comics as $comic)
                        <a href="{{ route('comics.show', $comic) }}" class="group">
                            <div
                                class="flex flex-col h-full overflow-hidden transition-transform duration-300 transform bg-white shadow-md rounded-xl hover:-translate-y-1 dark:bg-gray-800">
                                <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}"
                                    class="object-cover w-full h-64 min-h-64 max-h-64">
                                <div class="flex flex-col flex-1 p-4">
                                    <h3
                                        class="font-semibold text-gray-800 truncate group-hover:text-[#FF6900] dark:text-gray-100 text-lg mb-1">
                                        {{ $comic->title }}
                                    </h3>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                                        {{ $comic->chapters()->count() }} chapter • {{ $comic->author }}
                                    </p>
                                    <div class="flex flex-wrap gap-1 mb-2">
                                        @foreach ($comic->genre ?? [] as $genre)
                                            <span
                                                class="px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900] font-semibold">
                                                {{ $genre }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <span
                                        class="inline-block mt-1 px-2 py-0.5 text-xs rounded bg-[#FF6900] bg-opacity-10 text-[#FF6900] font-semibold w-max">
                                        {{ $comic->status }}
                                    </span>
                                    <p class="flex-1 mt-2 text-xs text-gray-400 dark:text-gray-500">
                                        {{ Str::limit(strip_tags($comic->sinopsis), 80) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-gray-500 col-span-full dark:text-gray-300">Belum ada komik untuk
                            ditampilkan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
