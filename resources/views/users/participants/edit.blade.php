<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Participants') }} 
        </h2>
    </x-slot>

            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-100 dark:text-gray-500 text-center">
                            <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
                <h1 class="text-xl font-semibold mb-4 text-gray-700">Edit Participant</h1>
                <form action="{{ route('participants.update', $participants->id)}}" method="post">
                @csrf
                @method('PUT')
                @include('users.participants.partials.form', ['participants' => $participants])

                
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>