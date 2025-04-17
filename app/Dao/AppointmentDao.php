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
     * @param array $data
     * @return object
    */
    public function store(array $data) : object
    {
        $appointment = new Appointment();
        $appointment->doctor_id = $data['doctor_id'];
        $appointment->patient_id = $data['patient_id'];
        $appointment->appointment_date = $data['appointment_date'];
        $appointment->appointment_time = $data['appointment_time'];
        $appointment->notes = $data['notes'] ?? null;
        
        if (!$appointment->save()) {
            throw new \Exception('Failed to save appointment');
        }
        
        return $appointment;
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