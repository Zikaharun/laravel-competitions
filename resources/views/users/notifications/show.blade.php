@extends('layouts.customs')

@section('title', 'Detail Notifikasi')
@section('body-class', 'bg-gray-50 dark:bg-gray-950')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-900 rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $notification->title }}</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $notification->message }}</p>
    <small class="text-gray-500 dark:text-gray-400 block mb-6">Dikirim: {{ $notification->created_at->format('d M Y H:i') }}</small>

    <div class="mt-3">
        <a href="{{ route('user.notifications.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-700 transition">
            Kembali
        </a>
    </div>
</div>
@endsection
