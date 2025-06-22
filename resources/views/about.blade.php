<!-- filepath: c:\Users\hp\Desktop\Rpl\web-comic\resources\views\about.blade.php -->
<x-app-layout>
    <div class="w-full min-h-screen flex flex-col items-center bg-[#FDFDFC] dark:bg-[#0a0a0a] py-10 px-2">
        <div class="w-full max-w-4xl bg-white dark:bg-[#161615] rounded-xl shadow p-8">
            <h1 class="mb-4 text-2xl font-bold text-center text-gray-900 dark:text-gray-100">About Us</h1>
            <p class="mb-8 text-center text-gray-700 dark:text-gray-300">
                Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque
                sem
                placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor.
                Pulvinar
                vulputate fringilla lacus nec metus bibendum egestas. Iaculis massa nisi malesuada lacinia integer nunc
                posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra
                inceptos himenaeos.
            </p>
            <div class="flex flex-col gap-8 md:flex-row md:justify-between">
                <div>
                    <h2 class="mb-2 font-semibold text-gray-900 dark:text-gray-100">Follow us!</h2>
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" />
                            <circle cx="12" cy="12" r="5" />
                            <circle cx="17" cy="7" r="1.5" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">pojokkomik.id</span>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:pojokkomik.id@gmail.com"
                            class="text-gray-700 underline dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">pojokkomik.id@gmail.com</a>
                    </div>
                </div>
                <div>
                    <h2 class="mb-2 font-semibold text-gray-900 dark:text-gray-100">Our Address</h2>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Kampus 4 Universitas Ahmad Dahlan, Jl Ringroad Selatan, Kragilan, Tamanan, Kec.Banguntapan,
                        Bantul,
                        DI Yogyakarta
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
