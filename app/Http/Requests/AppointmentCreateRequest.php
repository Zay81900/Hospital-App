<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentCreateRequest extends FormRequest
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
            'doctor' => 'required|string',
            'phone' => 'required|string',
            'appointment_date' => 'required|string',
            'appointment_time' => 'nullable|string',
            'notes' => 'nullable|string'
        ];
    }
} 