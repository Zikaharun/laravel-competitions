<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100 dark:text-gray-500 text-center">
                    {{ __("You're logged in!") }}
                    Selamat datang Admin di aplikasi lomba!
                    

                </div>
            </div>
            <div class="p-6 text-gray-100 dark:text-gray-500 text-center">
                <h2 class="text-white ">List daftar divisi lomba</h2>
                    
            {{-- resources/views/admin/dashboard.blade.php --}}


                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                
                                {{-- Flash message --}}
                                @if (session('success'))
                                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                                        {{ session('success') }}
                                    </div>
                                @endif


                                {{-- Table --}}
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">#</th>
                                                <th scope="col" class="px-6 py-3">User</th>
                                                <th scope="col" class="px-6 py-3">Competition</th>
                                                <th scope="col" class="px-6 py-3">description</th>
                                                <th scope="col" class="px-6 py-3">Created At</th>
                                                <th scope="col" class="px-6 py-3 text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($divisions as $division)
                                                <tr class="bg-white border-b hover:bg-gray-50">
                                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                                    <td class="px-6 py-4">{{ $division->user->name ?? '-' }}</td>
                                                    <td class="px-6 py-4">{{ $division->competition->name ?? '-' }}</td>
                                                    <td class="px-6 py-4">{{$division->competition->description ?? '-'}}</td>
                                                    <td class="px-6 py-4">{{ $division->created_at->format('d M Y') }}</td>
                                                    <td class="px-6 py-4 text-right">
                                                        {{-- <a href="{{ route('divisions.edit', $division->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                        <form action="{{ route('divisions.destroy', $division->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="text-red-600 hover:text-red-900"
                                                                    onclick="return confirm('Are you sure?')">
                                                                Delete
                                                            </button>
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                        No divisions found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination --}}
                                <div class="mt-4">
                                    {{ $divisions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>