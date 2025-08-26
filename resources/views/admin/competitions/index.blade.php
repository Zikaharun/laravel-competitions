@extends('layouts.customs')

@section('body-class', 'bg-gray-950 text-white')
@section('wrapper-class', 'bg-gray-950')

@section('content')
<div class="py-10">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                Competitions
            </h1>
            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Kelola kompetisi dengan mudah dan cepat ⚡
            </p>
        </div>

        {{-- Card Tambah Competition --}}
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                Tambah Competition
            </h2>

            <form method="POST" action="{{ route('admin.competitions.store') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                    <input type="text" name="name" required 
                        class="mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Deskripsi</label>
                    <textarea name="description" rows="3" required
                        class="mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal Mulai</label>
                    <input type="datetime-local" name="start" 
                        class="mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal Selesai</label>
                    <input type="datetime-local" name="end"
                        class="mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                </div>

                <button type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium shadow-md transition">
                    Simpan
                </button>
            </form>
        </div>

        {{-- Print Button --}}
        <div class="mb-4">
            <button onclick="window.print()" 
                class="bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow transition hover:bg-gray-700 print:hidden">
                Print Competitions
            </button>
        </div>

        {{-- List Competition --}}
        <div id="print-area" class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                Daftar Lomba
            </h2>

            @forelse ($competitions as $competition)
                <div class="flex items-start justify-between py-4 border-b border-gray-200 dark:border-gray-700 last:border-none print:flex-col print:items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            {{ $competition->name }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $competition->description }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $competition->start ?? '-' }} - {{ $competition->end ?? '-' }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 print:hidden">
                        {{-- Edit Button --}}
                        <a href="{{ route('admin.competitions.edit', $competition->id)}}" 
                           class="px-4 py-1.5 text-sm bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                           Edit
                        </a>

                        {{-- Delete Button --}}
                        <form action="{{ route('admin.competitions.destroy', $competition->id)}}" method="POST"
                              onsubmit="return confirm('Yakin mau hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-1.5 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Belum ada kompetisi yang ditambahkan.
                </p>
            @endforelse
        </div>
    </div>
</div>

<style>
@media print {
    /* Reset warna dan background umum */
    body, html {
        color: #000 !important;
        background: #fff !important;
        -webkit-print-color-adjust: exact; /* biar warna teks konsisten di browser */
    }

    /* Sembunyikan semua elemen yang tidak ingin dicetak */
    header,
    footer,
    nav,
    form,
    button,
    .print\:hidden,
    .pagination,
    .mb-4,
    .mb-6,
    .mb-8 {
        display: none !important;
    }

    /* Hanya tampilkan area print */
    #print-area {
        display: block !important;
        background: #fff !important; /* ubah dari transparent ke putih */
        color: #000 !important;
    }

    /* Tampilkan judul h2 dan tabel data */
    #print-area h2 {
        display: block !important;
        text-align: center !important;
        font-size: 1.5em !important;
        margin-bottom: 20px !important;
        color: #000 !important;
        background: #fff !important; /* ubah dari transparent ke putih */
    }

    #print-area table {
        display: table !important;
        width: 100% !important;
        border-collapse: collapse !important;
        margin-bottom: 20px !important;
        background: #fff !important; /* background putih untuk tabel */
        color: #000 !important;
    }

    #print-area th,
    #print-area td {
        border: 1px solid #000 !important;
        padding: 8px !important;
        color: #000 !important;
        background: #fff !important; /* background putih untuk sel */
    }

    /* Teks dan link di dalam tabel tetap terlihat */
    #print-area a {
        color: #000 !important;
        text-decoration: none !important;
    }
}

</style>
@endsection
