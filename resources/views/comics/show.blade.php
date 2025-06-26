<x-app-layout>
    <div class="container p-4 mx-auto md:p-8">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white transition bg-blue-600 rounded hover:bg-blue-700">
                ← Kembali ke Dashboard
            </a>
        </div>
        @auth
            @if (auth()->user()->is_admin)
                <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="inline-block mb-6"
                    onsubmit="return confirm('Yakin ingin menghapus komik ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 mb-4 text-white transition bg-red-600 rounded hover:bg-red-700">
                        Hapus Komik
                    </button>
                </form>
            @endif
        @endauth
        <div class="flex flex-col p-6 mb-8 bg-white shadow-lg rounded-xl dark:bg-gray-800 md:flex-row">
            <img src="{{ Storage::url($comic->thumbnail) }}" alt="{{ $comic->title }}"
                class="object-cover w-48 mb-4 rounded-md shadow-md h-72 md:mb-0 md:mr-6">
            <div class="flex flex-col flex-1">
                <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">{{ $comic->title }}</h1>
                <span
                    class="inline-block w-max bg-[#FF6900] bg-opacity-10 text-[#FF6900] text-sm font-semibold my-2 px-2.5 py-0.5 rounded">
                    {{ $comic->status }}
                </span>
                <div class="flex flex-wrap gap-2 my-2">
                    @foreach ($comic->genre ?? [] as $genre)
                        <span
                            class="inline-block bg-[#FF6900] bg-opacity-10 text-[#FF6900] text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $genre }}
                        </span>
                    @endforeach
                </div>
                <p class="mt-2 text-gray-600 dark:text-gray-300">{!! $comic->sinopsis !!}</p>
                @auth
                    <form action="{{ route('comics.bookmark', $comic) }}" method="POST" class="mt-6">
                        @csrf
                        <button type="submit"
                            class="px-6 py-2 rounded-lg bg-[#FF6900] text-white text-base font-bold shadow hover:bg-white hover:text-[#FF6900] border-2 border-[#FF6900] transition flex items-center gap-2">
                            @if (auth()->user()->bookmarks->where('comic_id', $comic->id)->count())
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v12l7-4 7 4V5a2 2 0 00-2-2H5z" />
                                </svg>
                                Hapus Bookmark
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5v14l7-4 7 4V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                                </svg>
                                Bookmark
                            @endif
                        </button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-gray-100">Daftar Chapter</h2>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($comic->chapters()->latest()->get() as $chapter)
                    <li class="py-3">
                        <a href="{{ route('chapters.show', $chapter) }}"
                            class="flex items-center justify-between p-2 text-gray-700 transition-colors rounded-md dark:text-gray-200 hover:text-blue-600 hover:bg-gray-50 dark:hover:text-blue-400 dark:hover:bg-gray-900">
                            <span>{{ $chapter->title }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $chapter->created_at->diffForHumans() }}
                            </span>
                        </a>
                    </li>
                @empty
                    <li class="py-3 text-center text-gray-500 dark:text-gray-400">Belum ada chapter untuk komik ini.
                    </li>
                @endforelse
            </ul>
        </div>

        {{-- Komentar --}}
        <div class="p-6 mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-gray-100">Komentar</h2>
            @auth
                <form action="{{ route('comments.store', $comic) }}" method="POST" class="mb-6">
                    @csrf
                    <textarea name="content" rows="3"
                        class="w-full p-2 text-gray-900 border rounded bg-gray-50 dark:bg-gray-900 dark:text-gray-100"
                        placeholder="Tulis komentar..."></textarea>
                    <button type="submit"
                        class="px-4 py-2 mt-2 text-white bg-blue-600 rounded hover:bg-blue-700">Kirim</button>
                </form>
            @else
                <p class="mb-4 text-gray-500 dark:text-gray-400">Login untuk menulis komentar.</p>
            @endauth

            <div>
                @forelse ($comic->comments()->latest()->get() as $comment)
                    <div class="p-3 mb-4 border-b border-gray-200 dark:border-gray-700">
                        <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $comment->user->name }}</span>
                        <span
                            class="ml-2 text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        <div class="mt-1 text-gray-700 dark:text-gray-200">{{ $comment->content }}</div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">Belum ada komentar.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
