{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    👋 {{ auth()->user()->name }}
                </h3>
                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    Selamat datang kembali di aplikasi lomba.  
                    Kamu berhasil login ke dashboard.
                </p>
            </div>

            <!-- Competition Status -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    📌 Status Divisi Lomba
                </h3>
                @if ($userDivisions?->competition?->name)
                    <p class="text-gray-700 dark:text-gray-300">
                        Kamu telah dipilih sebagai penanggung jawab divisi lomba:
                    </p>
                    <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">
                        {{ $userDivisions->competition->name }}
                    </p>
                @else
                    <p class="text-gray-600 dark:text-gray-300">
                        Kamu belum dipilih menjadi penanggung jawab divisi lomba.
                    </p>
                @endif
            </div>

            <!-- Quick Stats -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6 md:col-span-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    📊 Statistik Cepat
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="p-4 bg-indigo-50 dark:bg-indigo-900/40 rounded-xl text-center">
                        <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{$totalCompetitions}}</p>
                        <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{$userDivisions->competition->name}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Lomba Aktif</p>
                    </div>
                    <div class="p-4 bg-green-50 dark:bg-green-900/40 rounded-xl text-center">
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{$totalParticipants}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Peserta</p>
                    </div>
                    <div class="p-4 bg-yellow-50 dark:bg-yellow-900/40 rounded-xl text-center">
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{$totalDivisions}}</p>
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{$userDivisions->competition->name}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Divisi</p>
                    </div>
                    {{-- <div class="p-4 bg-red-50 dark:bg-red-900/40 rounded-xl text-center">
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400"></p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Event Selesai</p>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
