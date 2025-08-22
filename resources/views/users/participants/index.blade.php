<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competitions') }} 
        </h2>
    </x-slot>

            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-100 dark:text-gray-500 text-center">
                            <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
                <h1 class="text-xl font-semibold mb-4 text-gray-700">Tambah participant</h1>

                {{-- Form Tambah --}}
                <form method="POST" action="{{ route('participants.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama</label>
                        <input type="text" name="name" required 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">rt</label>
                        <input type="text" name="rt" rows="3" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600">ranking</label>
                        <input type="number" name="ranking" rows="3"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                        Simpan
                    </button>
                </form>

                {{-- List Participants --}}
                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-700 mb-2">Daftar Participant</h2>
                    <ul class="divide-y divide-gray-200">
                        @forelse ($participants as $participan)
                            <li class="py-2">
                                <span class="font-semibold text-gray-800">{{ $participan->name }}</span>
                                <p class="text-sm text-gray-500">{{ $participan->rt }}</p>
                                <p class="text-sm text-gray-500">{{ $participan->ranking }}</p>

                                                            
                                <div class="justify-center items-center flex space-x-2">
                                    {{-- Edit Button --}}
                                    {{-- <a href="{{ route('admin.competitions.edit', $competition->id)}}" 
                                    class="px-3 py-1 text-sm bg-gray-500 text-white rounded-md hover:bg-blue-600 transition">
                                    Edit
                                    </a> --}}

                                    {{-- Delete Button --}}
                                    {{-- <form action="{{ route('admin.competitions.destroy', $competition->id)}}" method="post" 
                                        method="POST" 
                                        onsubmit="return confirm('Yakin mau hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 ms-4 py-1 text-sm bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </form> --}}
                                </div>
                                                        </li>
                            @empty
                            <p class="text-sm text-gray-500">Belum ada lomba</p>
                        @endforelse
                        
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>