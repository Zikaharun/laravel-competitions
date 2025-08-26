@component('mail::message')
# {{ $notification->title }}

{{ $notification->message }}

@isset($notification->url)
@component('mail::button', ['url' => $notification->url])
Lihat Detail
@endcomponent
@endisset

Terima kasih,  
{{ config('app.name') }}
@endcomponent
