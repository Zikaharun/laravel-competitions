<section class="space-y-6">
    {{-- Header --}}
    <header class="text-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 tracking-tight">
            {{ __('Competition Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your competition information below.") }}
        </p>
    </header>

    {{-- User --}}
    <div class="space-y-2">
        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            User
        </label>
        <select name="user_id" id="user_id" required
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
                   sm:text-sm bg-white dark:bg-gray-900/60 
                   text-gray-800 dark:text-gray-100">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                    @selected(old('user_id', $divisions->user_id ?? '') == $user->id)>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
        @error('user_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Competition --}}
    <div class="space-y-2">
        <label for="competition_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Competition
        </label>
        <select name="competition_id" id="competition_id" required
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
                   sm:text-sm bg-white dark:bg-gray-900/60 
                   text-gray-800 dark:text-gray-100">
            <option value="">-- Select Competition --</option>
            @foreach($competitions as $competition)
                <option value="{{ $competition->id }}"
                    @selected(old('competition_id', $divisions->competition_id ?? '') == $competition->id)>
                    {{ $competition->name }}
                </option>
            @endforeach
        </select>
        @error('competition_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

</section>
