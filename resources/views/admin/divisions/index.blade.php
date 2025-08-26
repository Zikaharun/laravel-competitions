@extends('layouts.customs')

@section('title', 'Daftar anggota divisi lomba')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-10 px-6">
    <div class="max-w-6xl mx-auto">

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 text-sm font-medium shadow">
                {{ session('success') }}
            </div>
        @endif

         <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-6 text-center title">Daftar anggota divisi lomba</h2>
        {{-- Form Create --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-8 mb-8">
           

            <form action="{{ route('admin.divisions.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- User --}}
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">User</label>
                    <select name="user_id" id="user_id" required
                        class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200">
                        <option value="">-- Select User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Competition --}}
                <div>
                    <label for="competition_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Competition</label>
                    <select name="competition_id" id="competition_id" required
                        class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200">
                        <option value="">-- Select Competition --</option>
                        @foreach($competitions as $competition)
                            <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                        @endforeach
                    </select>
                    @error('competition_id')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold shadow hover:shadow-lg transition">
                        Save
                    </button>
                </div>
            </form>
        </div>

        {{-- Print Button --}}
        <div class="mb-4 flex justify-end">
            <button onclick="window.print()" class="px-6 py-2 rounded-lg bg-gray-700 text-white font-semibold shadow hover:bg-gray-900 transition print:hidden">
                Print
            </button>
        </div>

        {{-- Table --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl overflow-hidden" id="division-table">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                    <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">User</th>
                            <th class="px-6 py-3">Competition</th>
                            <th class="px-6 py-3">Created At</th>
                            <th class="px-6 py-3 text-right print:hidden">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($divisions as $division)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $division->user->name ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $division->competition->name ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $division->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-right space-x-2 print:hidden">
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.divisions.edit', $division->id) }}"
                                       class="inline-block px-3 py-1 mb-2 rounded-md text-sm bg-indigo-500 text-white hover:bg-indigo-600 transition">
                                        Edit
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('admin.divisions.destroy', $division->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-1 mb-2 rounded-md text-sm bg-red-500 text-white hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </form>
                                    {{-- Detail --}}
                                    <a href="{{ route('admin.participant_ranking.index', $division->id) }}"
                                       class="inline-block px-3 py-1 mb-2 rounded-md text-sm bg-green-500 text-white hover:bg-green-600 transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">
                                    No divisions found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 print:hidden">
                {{ $divisions->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Print CSS --}}
<style>
@media print {
    body, html {
        background: #fff !important;
        color: #000 !important;
    }
    /* Hide everything except the division table and title */
    form,
    .print\:hidden,
    .print\:hidden *,
    .mb-4.flex.justify-end,
    nav,
    header,
    footer,
    .max-w-6xl > :not(#division-table):not(.title) {
        display: none !important;
    }
    /* Show the title (h2 with class 'title') */
    .title {
        display: block !important;
        color: #000 !important;
        background: #fff !important;
        text-align: center !important;
        font-size: 1.5em !important;
        margin-bottom: 20px !important;
    }
    #division-table {
        display: block !important;
        background: #fff !important;
        color: #000 !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }
    #division-table * {
        color: #000 !important;
        background: #fff !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }
    table {
        border-collapse: collapse !important;
        width: 100% !important;
    }
    th, td {
        border: 1px solid #000 !important;
        padding: 8px !important;
    }
    a, button {
        color: #000 !important;
        background: none !important;
        text-decoration: none !important;
        border: none !important;
        box-shadow: none !important;
    }
}
</style>
@endsection
                

