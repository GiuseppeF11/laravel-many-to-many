<?php

namespace App\Http\Requests\Auth\Technology;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class StoreTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {

        return [
            'title'             => 'required|max:100',
        ];
    }
}
