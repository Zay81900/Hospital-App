<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

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

    
}
