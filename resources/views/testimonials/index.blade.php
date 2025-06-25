<x-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-center text-pink-600">Daftar Testimoni</h1>
        <div class="space-y-4">
            @forelse ($testimonials as $testimonial)
                <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded">
                    <div class="italic text-gray-800 dark:text-gray-100 mb-1">
                        "{{ $testimonial->content }}"
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-300">
                        — {{ $testimonial->name }}, <span class="italic">{{ $testimonial->comic_title }}</span>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 dark:text-gray-400 py-8">
                    Belum ada testimoni.
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
