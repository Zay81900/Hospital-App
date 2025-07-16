<?php

namespace App\Http\Controllers;
use App\Http\Requests\AppointmentCreateRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Contracts\Services\AppointmentServiceInterface;
use App\Models\Appointment;
use App\Notifications\NewAppointmentNotification;

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
        
        try {
            // Debug log the validated data
            \Illuminate\Support\Facades\Log::info('Appointment Data:', $validatedData);

            // Create the appointment
            $appointment = $this->appointmentService->store([
                'doctor_id' => $validatedData['doctor_id'],
                'patient_id' => $validatedData['patient_id'],
                'appointment_date' => $validatedData['appointment_date'],
                'appointment_time' => $validatedData['appointment_time'],
                'notes' => $validatedData['notes'] ?? null
            ]);

            if (!$appointment) {
                throw new \Exception('Failed to create appointment');
            }

            // Load the relationships needed for notification
            $appointment->load(['patient', 'doctor']);

            // Send notification to doctor
            $doctor = Doctor::findOrFail($validatedData['doctor_id']);
            
            // Log doctor details
            \Illuminate\Support\Facades\Log::info('Doctor Details:', [
                'id' => $doctor->id,
                'name' => $doctor->doctor_name,
                'email' => $doctor->email
            ]);

            if (empty($doctor->email)) {
                throw new \Exception('Doctor email is not set');
            }

            // Log before sending notification
            \Illuminate\Support\Facades\Log::info('Sending notification to doctor...');
            
            $doctor->notify(new NewAppointmentNotification($appointment));
            
            // Log after sending notification
            \Illuminate\Support\Facades\Log::info('Notification sent successfully');

            return redirect()->route('user.index')
                ->with('success', 'Your appointment has been booked successfully and the doctor will be notified.');
            
        } catch (\Exception $e) {
            // Log the detailed error
            \Illuminate\Support\Facades\Log::error('Appointment creation failed: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'There was an error booking your appointment. Please try again.')
                ->withInput();
        }
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
