<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Competition Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your competition information and email address.") }}
        </p>
    </header>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama</label>
                        <input type="text" name="name" value="{{ old('name', optional($competitions)->name) }}" required 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                        <textarea name="description" rows="3" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{old('description', optional($competitions)->description)}}</textarea>
                             @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                        Simpan
                    </button>

</section>
