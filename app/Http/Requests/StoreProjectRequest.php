<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:projects|max:50',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => [
                'required',
                Rule::in(['ongoing', 'completed']),
            ],
            'category' => [
                'required',
                Rule::in(['frontend', 'backend']),
            ],
            'language' => 'required|string',
            'thumb' => 'required|url',
            'slug' => 'required|string|max:255|unique:projects',
        ];
    }
}
