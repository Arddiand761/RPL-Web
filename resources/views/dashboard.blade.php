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
                                        {{ $comic->title }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">5 dibaca • Penulis</p>
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
