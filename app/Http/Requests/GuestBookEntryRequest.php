<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuestBookEntryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body'    => ['required', 'min:3', 'max:65535'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
