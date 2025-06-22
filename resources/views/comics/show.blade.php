<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $comic->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container p-4 mx-auto md:p-8">
        <div class="flex flex-col p-6 mb-8 bg-white rounded-lg shadow-lg md:flex-row">
            <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}" class="object-cover w-48 mb-4 rounded-md shadow-md h-72 md:mb-0 md:mr-6">
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-gray-900">{{ $comic->title }}</h1>
                <span class="inline-block bg-blue-100 text-blue-800 text-sm font-medium my-3 px-2.5 py-0.5 rounded">{{ $comic->status }}</span>
                <p class="mt-4 text-gray-600">{!! $comic->sinopsis !!}</p>
            </div>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-2xl font-bold text-gray-800">Daftar Chapter</h2>
            <ul class="divide-y divide-gray-200">
                @forelse ($comic->chapters()->latest()->get() as $chapter)
                    <li class="py-3">
                        <a href="{{ route('chapters.show', $chapter) }}" class="flex items-center justify-between p-2 text-gray-700 transition-colors rounded-md hover:text-blue-600 hover:bg-gray-50">
                            <span>{{ $chapter->title }}</span>
                            <span class="text-sm text-gray-500">
                                {{ $chapter->created_at->diffForHumans() }}
                            </span>
                        </a>
                    </li>
                @empty
                    <li class="py-3 text-center text-gray-500">Belum ada chapter untuk komik ini.</li>
                @endforelse
            </ul>
        </div>
    </div>
</body>
</html>
