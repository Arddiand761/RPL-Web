<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <div class="container p-4 mx-auto md:p-8">
            <h1 class="mb-8 text-3xl font-bold text-gray-800 dark:text-gray-100">Daftar Komik</h1>
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                @forelse ($comics as $comic)
                    <a href="{{ route('comics.show', $comic) }}" class="group">
                        <div
                            class="overflow-hidden transition-transform duration-300 transform bg-white rounded-lg shadow-md dark:bg-gray-800 hover:-translate-y-2">
                            <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}"
                                class="object-cover w-full h-64">
                            <div class="p-4">
                                <h3
                                    class="font-semibold text-gray-800 truncate dark:text-gray-100 group-hover:text-blue-600">
                                    {{ $comic->title }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $comic->status }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-gray-500 col-span-full dark:text-gray-400">Belum ada komik yang
                        ditambahkan.</p>
                @endforelse
            </div>
            <div class="mt-8">
                {{ $comics->links() }}
            </div>
        </div>
    </x-app-layout>
</body>

</html>
