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
            'doctor_id' => 'required|string|',
            'patient_id' => 'nullable|string|',
            'appointment_date' => 'required|string',
            'appointment_time' => 'required|string',
            'notes' => 'nullable|string'
        ];
    }
} 