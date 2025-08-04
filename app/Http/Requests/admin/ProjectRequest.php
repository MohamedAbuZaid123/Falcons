<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|max:50|unique:projects,title,' . ($this->project->id ?? ''),
            'title_ar' => 'required|max:50|unique:projects,title_ar,' . ($this->project->id ?? ''),
            'description' => 'required',
            'description_ar' => 'required',
            'category' => 'required',
            'services' => 'required',
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
            'category.required' => 'The Category is required.',
            'services.required' => 'atleast add one service',

        ];
    }
}
