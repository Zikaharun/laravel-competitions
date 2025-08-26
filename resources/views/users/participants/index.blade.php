<x-app-layout>
    @section('title', 'Daftar Peserta lomba' )
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Card Tambah Participant -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">
                <h1 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                    Tambah Participant
                </h1>

                <form method="POST" action="{{ route('participants.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Nama</label>
                        <input type="text" name="name" required 
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">RT</label>
                        <input type="text" name="rt" required
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Ranking</label>
                        <input type="number" name="ranking"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-100">
                    </div>

                    <button type="submit" 
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition">
                        Simpan
                    </button>
                </form>
            </div>

            <!-- Card Daftar Participants -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Daftar Peserta di Division: 
                        <span class="text-indigo-600 dark:text-indigo-400">
                            {{ $division?->competition?->name ?? '-' }}
                        </span>
                    </h2>
                    <!-- Print Button -->
                    <button onclick="printParticipants()" class="bg-black text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition print:hidden">
                        Print
                    </button>
                </div>

                @if($participants && $participants->isNotEmpty())
                    <div class="overflow-x-auto" id="participants-table">
                        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">No</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Nama Peserta</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">RT</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Ranking</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200 print:hidden">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($participants as $index => $participant)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $participant->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $participant->rt ?? '-' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $participant->ranking ?? '-' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 justify-center items-center print:hidden">
                                            <a href="{{ route('participants.edit', $participant->id) }}"
                                               class="inline-block px-3 py-1 mb-2 rounded-md text-sm bg-indigo-500 text-white hover:bg-indigo-600 transition">
                                                Edit
                                            </a>
                                            {{-- Delete --}}
                                            <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-block px-3 py-1 mb-2 rounded-md text-sm bg-red-500 text-white hover:bg-red-600 transition">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600 dark:text-gray-400">Tidak ada peserta di divisi ini.</p>
                @endif
            </div>

        </div>
    </div>

    <!-- Print JS -->
    <script>
        function printParticipants() {
            window.print();
        }
    </script>

    <!-- Print CSS -->
    <style>
        @media print {
            body, html {
                background: #fff !important;
                color: #000 !important;
            }
            .bg-white, .dark\:bg-gray-800, .bg-gray-100, .dark\:bg-gray-700 {
                background: #fff !important;
            }
            .text-gray-800, .dark\:text-gray-100, .text-gray-700, .dark\:text-gray-200, .text-indigo-600, .dark\:text-indigo-400, .text-gray-600, .dark\:text-gray-400, .text-gray-300 {
                color: #000 !important;
            }
            .border, .border-gray-200, .dark\:border-gray-700, .border-gray-300, .dark\:border-gray-600, .border-green-400, .border-red-400 {
                border-color: #000 !important;
            }
            .shadow-lg, .shadow-md, .rounded-2xl, .rounded-lg {
                box-shadow: none !important;
                border-radius: 0 !important;
            }
            .print\:hidden {
                display: none !important;
            }
            /* Hide all buttons and forms */
            button, form, a {
                display: none !important;
            }
            /* Show only the participants table */
            #participants-table {
                margin-top: 0 !important;
            }
        }
    </style>
</x-app-layout>

