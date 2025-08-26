@extends('layouts.customs')

@section('title', 'Notifikasi')
@section('body-class', 'bg-gray-50 dark:bg-gray-950')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Notifikasi</h2>

    @if($notifications->isEmpty())
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6 text-center">
            <p class="text-gray-500 dark:text-gray-400">Tidak ada notifikasi.</p>
        </div>
    @else
        <ul class="space-y-4">
            @foreach($notifications as $notification)
                <li class="bg-white dark:bg-gray-900 rounded-lg shadow flex justify-between items-center px-6 py-4 hover:bg-blue-50 dark:hover:bg-blue-950 transition">
                    <a href="{{ route('user.notifications.show', $notification->id) }}" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                        {{ $notification->title }}
                    </a>
                    <small class="text-gray-400 dark:text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
