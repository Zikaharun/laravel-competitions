@extends('layouts.customs')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12 px-6">
    <div class="max-w-3xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
                Edit Competition
            </h1>

            <!-- Form -->
            <form action="{{ route('admin.competitions.update', $competitions->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @include('admin.competitions.partials.form', ['competitions' => $competitions])

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('admin.competitions.index') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        Batal
                    </a>

                    <button type="submit" 
                        class="px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold shadow-md hover:shadow-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
