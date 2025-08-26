@extends('layouts.customs')

@section('body-class', 'bg-gray-950 text-white')
@section('wrapper-class', 'bg-gray-950')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-bold text-2xl text-white leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
        <span class="text-sm text-gray-300">
            {{ now()->format('d M Y, H:i') }}
        </span>
    </div>
@endsection

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Welcome Card --}}
        <div class="bg-gradient-to-r from-indigo-500 via-fuchsia-600 to-rose-500 shadow-xl rounded-2xl p-6 text-white">
            <h3 class="text-xl font-semibold">Selamat datang, Admin 🎉</h3>
            <p class="mt-2 text-sm/relaxed text-white/90">
                Anda berhasil login ke aplikasi manajemen perlombaan. Kelola divisi dan kompetisi dengan mudah!
            </p>
        </div>

        {{-- Statistik Ringkas (kiri → kanan) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-2xl p-6 text-center shadow-lg bg-gradient-to-r from-sky-500 to-indigo-600 ring-1 ring-white/10">
                <p class="text-sm font-semibold text-white/90">Total Divisi</p>
                <h3 class="mt-2 text-3xl font-extrabold text-white">
                    {{ $divisions->count() }}
                </h3>
            </div>
            <div class="rounded-2xl p-6 text-center shadow-lg bg-gradient-to-r from-violet-600 to-fuchsia-600 ring-1 ring-white/10">
                <p class="text-sm font-semibold text-white/90">Total Kompetisi</p>
                <h3 class="mt-2 text-3xl font-extrabold text-white">
                    {{ \App\Models\Competition::count() }}
                </h3>
            </div>
            <div class="rounded-2xl p-6 text-center shadow-lg bg-gradient-to-r from-emerald-600 to-teal-600 ring-1 ring-white/10">
                <p class="text-sm font-semibold text-white/90">Peserta Terdaftar</p>
                <h3 class="mt-2 text-3xl font-extrabold text-white">
                    {{ \App\Models\Participant::count() }}
                </h3>
            </div>
        </div>

        {{-- Tabel Divisi (lebih cerah & kontras) --}}
        <div class="overflow-hidden rounded-2xl shadow-xl bg-gray-900/60 ring-1 ring-white/10">
            <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">📋 Daftar Divisi Lomba</h3>
                
            </div>

            {{-- Flash message (versi dark-friendly) --}}
            @if (session('success'))
                <div class="m-4 p-4 text-sm text-emerald-200 bg-emerald-900/30 rounded-xl ring-1 ring-emerald-400/30">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase bg-gray-800/80 text-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Anggota</th>
                            <th scope="col" class="px-6 py-3">Kompetisi</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-100">
                        @forelse($divisions as $division)
                            <tr class="odd:bg-gray-900/70 even:bg-gray-800/70 border-b border-white/5 hover:bg-gray-700/60 transition">
                                <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $division->user->name ?? '-' }}</td>
                                <td class="px-6 py-4 font-semibold text-indigo-300">
                                    {{ $division->competition->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-gray-300">
                                    {{ $division->competition->description ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-gray-300">
                                    {{ $division->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-900/70">
                                <td colspan="6" class="px-6 py-6 text-center text-gray-300">
                                    Tidak ada divisi ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-white/10">
                {{ $divisions->links() }}
            </div>
        </div>

    </div>
</div>
@endsection



