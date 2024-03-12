<?php

namespace App\Http\Requests\Auth\Project;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title'             => 'required|max:100',
            'description'       => 'required|max:1024',
            'url'               => 'required|url',
            'type_id'           => 'required|exists:types,id',
            'technologies'      => 'nullable|array|exists:technologies,id',
            'cover_img'         => 'nullable|image',
        ];
    }
}
