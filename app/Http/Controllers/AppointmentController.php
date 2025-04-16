<?php

namespace App\Http\Controllers;
use App\Http\Requests\AppointmentCreateRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Contracts\Services\AppointmentServiceInterface;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //
    protected $appointmentService;

    public function __construct(AppointmentServiceInterface $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function appointment() {
        $doctors = Doctor::all();
        return view('user.appointment', ['doctors'=> $doctors]);
    }

    public function appointmentStore(AppointmentCreateRequest $request) {
        $validatedData = $request->validated();
        $this->appointmentService->store([
            'doctor_id' => $validatedData['doctor_id'],
            'patient_id' => $validatedData['patient_id'],
            'appointment_date' => $validatedData['appointment_date'],
            'appointment_time' => $validatedData['appointment_time'],
            'notes' => $validatedData['notes']
        ]);


        return redirect()->route('user.index')
            ->with('success', 'Your have booked for appointment Successfully...');

    }

    public function show(Appointment $appointment)
    {
        return response()->json($appointment->load('patient', 'doctor'));
    }

    public function updateStatus(Appointment $appointment, Request $request)
    {
        try {
            $request->validate([
                'status' => 'required|in:confirmed,cancelled'
            ]);

            $appointment->status = $request->status;
            $appointment->save();

            return response()->json([
                'success' => true,
                'message' => 'Appointment status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating appointment status'
            ], 500);
        }
    }
}
