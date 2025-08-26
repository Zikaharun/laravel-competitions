@extends('layouts.customs')

@section('title', 'Buat Notifikasi')
@section('body-class', 'bg-gray-50 dark:bg-gray-950')

@section('content')
<div class="py-10">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    @if(session('success'))
      <div class="mb-4 rounded-xl bg-emerald-50 text-emerald-700 px-4 py-3 border border-emerald-200">
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="mb-4 rounded-xl bg-rose-50 text-rose-700 px-4 py-3 border border-rose-200">
        {{ session('error') }}
      </div>
    @endif
    @if($errors->any())
      <div class="mb-4 rounded-xl bg-amber-50 text-amber-800 px-4 py-3 border border-amber-200">
        <ul class="list-disc list-inside text-sm">
          @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
        </ul>
      </div>
    @endif

    <div class="bg-white dark:bg-gray-900/70 rounded-2xl shadow-sm ring-1 ring-gray-200/60 dark:ring-gray-800/60">
      <div class="p-6">
        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Buat Notifikasi</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Notifikasi akan dikirim ke semua user non-admin via email.</p>

        <form action="{{ route('admin.notifications.store') }}" method="POST" class="mt-6 space-y-5">
          @csrf
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
              class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pesan</label>
            <textarea name="message" rows="5"
              class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('message') }}</textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">URL (opsional)</label>
            <input type="url" name="url" value="{{ old('url') }}"
              class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://...">
          </div>

          <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ route('notifications.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Batal</a>
            <button class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow-sm">
              Kirim Notifikasi
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
