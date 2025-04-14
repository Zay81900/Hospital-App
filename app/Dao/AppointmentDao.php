<?php

namespace App\Dao;

use App\Contracts\Dao\AppointmentDaoInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;

class AppointmentDao implements AppointmentDaoInterface
{
    /**
     * Show Appointment
     * @return object
    */
    public function get(): object
    {
        return Appointment::paginate(3);
    }
    
    /**
     * Store Appointment
     * @return void
    */
    public function store() : void
    {
        $appointment = New Appointment();
        $appointment->doctor_id = request('doctor_id');
        $appointment->patient_id = request('patient_id');
        $appointment->appointment_date = request('appointment_date');
        $appointment->appointment_time = request('appointment_time');
        $appointment->notes = request('notes');
        $appointment->save();
    }

    /**
     * Return Specific Appointment
     * @return object
    */
    public function edit($id) : object
    {
        return Appointment::findOrFail($id);
    }

    /**
     * Update Appointment
     * @return void
    */
    public function update($id, array $data): void
    {
        $appointment = Appointment::findOrFail($id);
        // $user->username = $data['username'];
        // $user->image = $data['image'] ?? $user->image;
        // $user->address = $data['address'];
        // $user->gender = $data['gender'];
        // $user->phone = $data['phone'];
        // $user->save();
    }

    /**
     * Destroy Appointment
     * @return void 
    */
    public function destroy($id) : void
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
    }
}