<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Bookmark Collection</h2>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4">
                    @forelse ($comics as $comic)
                        <a href="{{ route('comics.show', $comic) }}" class="group">
                            <div
                                class="overflow-hidden transition-transform duration-300 transform bg-white rounded-lg shadow-md hover:-translate-y-1 dark:bg-gray-800">
                                <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}"
                                    class="object-cover w-full h-64">
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
                                                class="px-2 py-0.5 text-xs rounded bg-pink-100 text-pink-700">{{ $genre }}</span>
                                        @endforeach
                                    </div>
                                    <span
                                        class="inline-block mt-2 px-2 py-0.5 text-xs rounded bg-blue-100 text-blue-700">
                                        {{ $comic->status }}
                                    </span>
                                    <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                                        {{ Str::limit(strip_tags($comic->sinopsis), 80) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-center text-gray-500 col-span-full dark:text-gray-300">Belum ada komik di
                            bookmark.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
