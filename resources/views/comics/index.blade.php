<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 md:p-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Daftar Komik</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @forelse ($comics as $comic)
                <a href="{{ route('comics.show', $comic) }}" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 truncate group-hover:text-blue-600">{{ $comic->title }}</h3>
                            <p class="text-sm text-gray-500">{{ $comic->status }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada komik yang ditambahkan.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $comics->links() }}
        </div>
    </div>
</body>
</html>
