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

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Start Date & Time</label>
                        <input type="datetime-local" name="start" value="{{ old('start', optional($competitions)->start ? \Carbon\Carbon::parse($competitions->start)->format('Y-m-d\TH:i:s') : '') }}" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('start') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">End Date & Time</label>
                        <input type="datetime-local" name="end" value="{{ old('end', optional($competitions)->end ? \Carbon\Carbon::parse($competitions->end)->format('Y-m-d\TH:i:s') : '') }}" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('end') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

</section>
