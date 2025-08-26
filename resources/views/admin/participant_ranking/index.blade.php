{{-- resources/views/divisions/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight tracking-tight">
            {{ __('Participant Ranking') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="overflow-hidden shadow-lg sm:rounded-xl
                       bg-gradient-to-br from-gray-50 via-white to-gray-100
                       dark:from-gray-800 dark:via-gray-900 dark:to-gray-950">
                <div class="p-8">

                    {{-- Flash message --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 text-sm rounded-lg
                                    text-green-700 bg-green-100 border border-green-300
                                    dark:bg-green-900/40 dark:text-green-300 dark:border-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="text-xl font-bold mb-6 text-gray-800 dark:text-gray-100">
                        {{ $divisionName?->competition?->name ?? '-' }}<br>
                        
                    </h1>
                    <span class="text-md font-semibold mb-5 text-gray-100">Penanggung Jawab Lomba</span><br>
                        <span class="text-sm font-semibold mb-7 text-gray-300">{{ $divisionName?->user->name ?? '-' }}</span><br>

                    {{-- Table --}}
                    <div class="overflow-x-auto mt-5">
                        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800/60">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">RT</th>
                                    <th scope="col" class="px-6 py-3">Ranking</th>
                                    <th scope="col" class="px-6 py-3">Created At</th>
                                    <th scope="col" class="px-6 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($participants as $participan)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                        <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $participan->name ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $participan->rt ?? '-' }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                {{ $participan->ranking == 1 
                                                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300'
                                                    : 'bg-gray-100 text-gray-700 dark:bg-gray-800/40 dark:text-gray-300' }}">
                                                {{ $participan->ranking ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">{{ $participan->created_at->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('admin.participant_divisions.destroy', $participan->id) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:underline font-medium"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No participants found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
