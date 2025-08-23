<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit participants') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Edit participants Competitions in this divisions") }}
        </p>
    </header>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-600"></label>
                        <input type="text" name="name" value="{{ old('name', optional($participants)->name) }}" required 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Rt</label>
                        <input name="rt" rows="3" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('rt', optional($participants)->rt) }}">
                             @error('rt') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600">Ranking</label>
                        <input name="ranking" rows="3" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('ranking', optional($participants)->ranking) }}">
                             @error('ranking') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                        Simpan
                    </button>

</section>