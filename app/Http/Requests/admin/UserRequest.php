<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email:rfc,dns', 'unique:users,email,' . ($this->user ? $this->user->id : '')],
            'mobile' => 'required|string|min:10|max:15',
        ];

        // Only require password for new users
        if (!$this->user) {
            $rules['password'] = 'required|string|min:8';
        } else {
            $rules['password'] = 'nullable|string|min:8';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name cannot exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address (e.g., user@example.com).',
            'email.unique' => 'This email address is already registered.',
            'mobile.required' => 'The mobile number is required.',
            'mobile.min' => 'The mobile number must be at least 11 digits.',
            'mobile.max' => 'The mobile number cannot exceed 15 digits.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'param.required' => 'Please select at least one group.',
            'param.min' => 'Please select at least one group.'
        ];
    }
}
