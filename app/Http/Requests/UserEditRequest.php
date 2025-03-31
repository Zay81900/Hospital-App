<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'max:255'],
            // 'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp,svg', 'max:2048'],
            'address' => ['required', 'max:225'],
            'gender' => ['required', 'max:225'],
            // 'age' => ['required','max:225'],
            'phone' => ['required','max:225'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email', [ 'email.unique' => 'This email address is already in used.']],
        ];
    }
}