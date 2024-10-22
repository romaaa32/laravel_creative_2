<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'name' => ['required'],
            'description' => ['nullable'],
            'gender' => ['required', 'integer'],
            'avatar' => ['nullable'],
            'birthed_at' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
