<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'title'   => ['required', 'string', 'max:150'],
            'message' => ['required', 'string'],
            'action_url'     => ['nullable', 'url', 'max:255'],
        ];
    }
}
