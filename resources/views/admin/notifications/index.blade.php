@extends('layouts.customs')

@section('title', 'Notifikasi')
@section('body-class', 'bg-gray-50 dark:bg-gray-950')

@section('content')
<div class="py-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    @if(session('success'))
      <div class="rounded-xl bg-emerald-50 text-emerald-700 px-4 py-3 border border-emerald-200">
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="rounded-xl bg-rose-50 text-rose-700 px-4 py-3 border border-rose-200">
        {{ session('error') }}
      </div>
    @endif

    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Notifikasi</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Broadcast ke semua user non-admin</p>
      </div>
      <a href="{{ route('admin.notifications.create') }}"
         class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow-sm">
        + Buat Notifikasi
      </a>
    </div>

    <div class="bg-white dark:bg-gray-900/70 rounded-2xl shadow-sm ring-1 ring-gray-200/60 dark:ring-gray-800/60">
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-100 dark:bg-gray-800/60 text-gray-700 dark:text-gray-200">
            <tr>
              <th class="px-5 py-3 text-left font-semibold">Judul</th>
              <th class="px-5 py-3 text-left font-semibold">Penerima</th>
              <th class="px-5 py-3 text-left font-semibold">Dikirim</th>
              <th class="px-5 py-3 text-left font-semibold">Dibuat</th>
              <th class="px-5 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @forelse($notifications as $n)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
              <td class="px-5 py-3">
                <div class="font-medium text-gray-900 dark:text-gray-100">{{ $n->title }}</div>
                <div class="text-gray-500 dark:text-gray-400 line-clamp-1">{{ $n->message }}</div>
              </td>
              <td class="px-5 py-3 text-gray-700 dark:text-gray-300">
                {{ $n->recipients_count }}
              </td>
              <td class="px-5 py-3 text-gray-700 dark:text-gray-300">
                {{ $n->sent_at ? $n->sent_at->format('d M Y H:i') : '—' }}
              </td>
              <td class="px-5 py-3 text-gray-700 dark:text-gray-300">
                {{ $n->created_at->format('d M Y H:i') }}
              </td>
              <td class="px-5 py-3 text-right">
                @if($n->url)
                  <a href="{{ $n->url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">
                    Buka Link
                  </a>
                @endif
              </td>
            </tr>
            @empty
              <tr>
                <td colspan="5" class="px-5 py-6 text-center text-gray-500 dark:text-gray-400">Belum ada notifikasi.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="px-5 py-4">
        {{ $notifications->links() }}
      </div>
    </div>

  </div>
</div>
@endsection
