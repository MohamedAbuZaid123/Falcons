<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'title' => 'required|max:50|unique:services,title,' . ($this->service->id ?? ''),
            'title_ar' => 'required|max:50|unique:services,title_ar,' . ($this->service->id ?? ''),
            'description' => 'required',
            'description_ar' => 'required',
            'icon' => 'required|image|mimes:svg,webp|max:20048',
            'dark_icon' => 'required|image|mimes:xsvg,webp|max:20048',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:20048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Title field is required.',
            'title.max' => 'The Title cannot exceed 50 characters.',
            'title.unique' => 'This Title is already registered.',
            'description.required' => 'The Description field is required.',
            'description_ar.nullable' => 'The Arabic Description is optional.',
            'title_ar.max' => 'The Arabic Title cannot exceed 40 characters.',
            'title_ar.unique' => 'This Arabic Title is already registered.',
        ];
    }
}
