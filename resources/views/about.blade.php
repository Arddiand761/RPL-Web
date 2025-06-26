<!-- filepath: c:\Users\hp\Desktop\Rpl\web-comic\resources\views\about.blade.php -->
<x-app-layout>
    <div class="w-full min-h-screen flex flex-col items-center bg-[#FDFDFC] dark:bg-[#0a0a0a] py-10 px-2">
        <div class="w-full max-w-4xl bg-white dark:bg-[#161615] rounded-xl shadow p-8">
            <h1 class="mb-4 text-3xl font-extrabold text-center text-[#FF6900]">Tentang POJOK KOMIK</h1>
            <p class="mb-8 text-lg text-center text-gray-700 dark:text-gray-300">
                <span class="font-semibold text-[#FF6900]">POJOK KOMIK</span> adalah platform digital yang menjadi wadah
                bagi
                komikus lokal Indonesia untuk mempromosikan, membagikan, dan mengembangkan karya komik mereka secara
                gratis. Kami percaya bahwa setiap kreator memiliki potensi besar untuk menginspirasi dan menghibur
                pembaca di seluruh nusantara.
            </p>
            <div class="mb-8 text-center">
                <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">Misi Kami</h2>
                <ul class="inline-block text-base text-left text-gray-700 list-disc list-inside dark:text-gray-300">
                    <li>Mendukung pertumbuhan industri komik lokal Indonesia.</li>
                    <li>Memberikan ruang promosi dan eksposur bagi komikus lokal.</li>
                    <li>Memudahkan pembaca menemukan dan menikmati komik karya anak bangsa.</li>
                    <li>Membangun komunitas kreator dan pembaca komik yang positif dan inspiratif.</li>
                </ul>
            </div>
            <div class="flex flex-col gap-8 md:flex-row md:justify-between">
                <div>
                    <h2 class="mb-2 font-semibold text-gray-900 dark:text-gray-100">Ikuti Kami</h2>
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-[#FF6900]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" />
                            <circle cx="12" cy="12" r="5" />
                            <circle cx="17" cy="7" r="1.5" />
                        </svg>
                        <span class="text-[#FF6900] font-semibold">pojokkomik.id</span>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-[#FF6900]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:pojokkomik.id@gmail.com"
                            class="text-[#FF6900] underline font-semibold hover:text-orange-700">pojokkomik.id@gmail.com</a>
                    </div>
                </div>
                <div>
                    <h2 class="mb-2 font-semibold text-gray-900 dark:text-gray-100">Alamat Kami</h2>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Kampus 4 Universitas Ahmad Dahlan, Jl Ringroad Selatan, Kragilan, Tamanan, Kec. Banguntapan,
                        Bantul, DI Yogyakarta
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
