<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 shadow rounded-xl p-8">
                <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">Edit Participant</h1>
                <form action="{{ route('participants.update', $participants->id) }}" method="post" class="space-y-6">
                    @csrf
                    @method('PUT')
                    @include('users.participants.partials.form', ['participants' => $participants])
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>