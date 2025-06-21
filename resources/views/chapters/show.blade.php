<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca {{ $chapter->comic->title }} - {{ $chapter->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto max-w-3xl text-center p-4">
        <h1 class="text-3xl font-bold my-4">{{ $chapter->comic->title }}</h1>
        <h2 class="text-xl mb-8">{{ $chapter->title }}</h2>

        <div>
            <a href="{{ route('comics.show', $chapter->comic) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                &larr; Kembali ke Daftar Chapter
            </a>
        </div>
    </div>

    <div class="flex flex-col items-center">
        @foreach ($chapter->images as $imagePath)
            <img src="{{ Storage::url($imagePath) }}" alt="Gambar Chapter" class="max-w-full md:max-w-3xl mb-1">
        @endforeach
    </div>

     <div class="text-center p-8">
        <a href="{{ route('comics.show', $chapter->comic) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            &larr; Kembali ke Daftar Chapter
        </a>
    </div>
</body>
</html>
