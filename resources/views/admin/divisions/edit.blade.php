{{-- resources/views/admin/divisions/edit.blade.php --}}
@extends('layouts.customs')

@section('body-class', 'bg-gray-950 text-white')
@section('wrapper-class', 'bg-gray-950')

@section('title', 'Edit Division')

@section('content')
<div class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div 
            class="rounded-2xl shadow-lg overflow-hidden 
                   bg-gradient-to-br from-gray-50 via-white to-gray-100
                   dark:from-gray-900 dark:via-gray-950 dark:to-black
                   transition-colors duration-300 ease-in-out">
            
            <div class="p-10 flex items-center justify-center">
                <div 
                    class="w-full max-w-xl p-8 rounded-xl shadow-lg
                           bg-white/70 dark:bg-gray-800/60 
                           backdrop-blur-md border border-gray-200/40 dark:border-gray-700/30
                           transition-all duration-300 ease-in-out">
                    
                    <h1 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100 text-center tracking-tight">
                        ✨ Edit Division
                    </h1>

                    <form action="{{ route('admin.divisions.update', $divisions->id)}}" method="post" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- partial form --}}
                        @include('admin.divisions.partials.form', ['divisions' => $divisions])

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-2 rounded-lg font-medium
                                       bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 
                                       hover:from-indigo-600 hover:via-purple-600 hover:to-pink-600
                                       text-white shadow-md 
                                       transition-all duration-300 ease-in-out">
                                💾 Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

