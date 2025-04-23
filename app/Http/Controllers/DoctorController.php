<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('doctor_name')->paginate(2);
        return view('user.doctors', compact('doctors'));
    }

    public function listDoctors(Request $request){
        $query = Doctor::query();

        // Handle search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('doctor_name', 'like', "%{$search}%")
                  ->orWhere('specialization', 'like', "%{$search}%")
                  ->orWhere('qualification', 'like', "%{$search}%");
            });
        }

        // Handle specialization filter
        if ($request->filled('specialization')) {
            $query->where('specialization', $request->input('specialization'));
        }

        $doctors = $query->orderBy('doctor_name')->paginate(2)->withQueryString();
        return view('user.doctors', compact('doctors'));  
    }

    public function dashboard()
    {
        $doctor = Auth::guard('doctor')->user();
        $appointments = Appointment::where('doctor_id', $doctor->id)
                                 ->orderBy('created_at', 'desc')
                                 ->take(5)
                                 ->get();
        
        $stats = [
            'total_appointments' => Appointment::where('doctor_id', $doctor->id)->count(),
            'pending_appointments' => Appointment::where('doctor_id', $doctor->id)
                                              ->where('status', 'pending')
                                              ->count(),
            'completed_appointments' => Appointment::where('doctor_id', $doctor->id)
                                                ->where('status', 'completed')
                                                ->count()
        ];

        return view('doctor.dashboard', compact('doctor', 'appointments', 'stats'));
    }

    public function appointments()
    {
        $doctor = Auth::guard('doctor')->user();
        $appointments = Appointment::where('doctor_id', $doctor->id)
                                 ->orderBy('appointment_date', 'desc')
                                 ->paginate(10);
        
        return view('doctor.appointments', compact('appointments'));
    }

    public function patients()
    {
        $doctor = Auth::guard('doctor')->user();
        $patients = $doctor->patients()->distinct()->paginate(10);
        
        return view('doctor.patients', compact('patients'));
    }

    public function profile()
    {
        $doctor = Auth::guard('doctor')->user();
        return view('doctor.profile', compact('doctor'));
    }
}
