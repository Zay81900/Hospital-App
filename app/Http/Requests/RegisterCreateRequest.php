<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'email' => ['required', 'max:255', 'email', 'unique:users,email', [ 'email.unique' => 'This email address is already in used.']],
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'blood_type' => 'required|string',
            'disease_description' => 'nullable|string'
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
} 