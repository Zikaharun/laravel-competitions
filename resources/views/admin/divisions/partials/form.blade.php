<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Competition Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your competition information and email address.") }}
        </p>
    </header>
                    
{{-- User --}}
<div>
    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
    <select name="user_id" id="user_id" required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
<div>
    <label for="competition_id" class="block text-sm font-medium text-gray-700">Competition</label>
    <select name="competition_id" id="competition_id" required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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

                    {{-- Button --}}
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm">
                            Save
                        </button>
                    </div>
                


</section>