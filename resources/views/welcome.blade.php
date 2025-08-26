<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Manajemen Kompetisi</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="max-w-4xl w-full mx-auto mt-12 p-8 bg-white dark:bg-gray-800/60 rounded-xl shadow-2xl shadow-gray-500/20 dark:shadow-none">
            <div class="flex flex-col items-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center mb-2">Platform Manajemen Kompetisi</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 text-center max-w-2xl">
                    Permudah organisasi Anda untuk membuat, mengelola, dan mempromosikan kompetisi. Dari hackathon hingga turnamen olahraga, platform kami memudahkan setiap langkah—fokus pada yang terpenting: kompetisi!
                </p>
                   
                </div>
           
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Yang Bisa Anda Lakukan</h2>
                    <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-2">
                        <li>Membuat dan menyesuaikan acara kompetisi dengan mudah</li>
                        <li>Mengelola pendaftaran online dan peserta</li>
                        <li>Menjadwalkan otomatis dan mengirim notifikasi</li>
                        <li>Memantau skor dan hasil secara real-time</li>
                        <li>Dukungan untuk kompetisi tim dan individu</li>
                        <li>Berkomunikasi dengan semua peserta dengan mudah</li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Kenapa Penyelenggara Memilih Kami</h2>
                    <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-2">
                        <li>Dashboard intuitif untuk pengaturan acara cepat</li>
                        <li>Platform aman, handal, dan skalabel</li>
                        <li>Tampilan mobile-friendly untuk penyelenggara dan peserta</li>
                        <li>Alat analitik dan pelaporan yang lengkap</li>
                        <li>Tim dukungan khusus siap membantu</li>
                    </ul>
                </div>
            </div>
            <div class="mt-10 text-center">
                <h2 class="text-2xl font-bold text-red-500 mb-2">Siap Memulai Kompetisi Anda?</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                    Bergabunglah dengan ratusan organisasi yang mempercayai platform kami untuk acara yang lancar, menarik, dan sukses.
                </p>
                <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-4">

    
                     @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-green-500 text-white font-semibold rounded-full shadow hover:bg-green-600 transition">Masuk</a>
                    @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-blue-500 text-white font-semibold rounded-full shadow hover:bg-blue-600 transition">Daftar</a>
                        @endif
                    @endauth
                     @endif
                </div>
                {{-- <a href="#" class="inline-block px-8 py-3 bg-red-500 text-white font-semibold rounded-full shadow hover:bg-red-600 transition">Mulai Sekarang</a> --}}
            </div>
        </div>
        <footer class="mt-8 text-gray-500 dark:text-gray-400 text-sm text-center">
            &copy; {{ date('Y') }} Platform Manajemen Kompetisi. Semua hak cipta dilindungi.
        </footer>
    </div>
</body>
</html>



