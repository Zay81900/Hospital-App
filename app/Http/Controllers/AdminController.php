<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function UserList()
    {
        $users = User::all();
        $editUser = null;
        return view('admin.pages.userlist', compact('users'));
    }

    public function editUser($id)
    {
        $users = User::all();
        $editUser = User::find($id);
        return view('admin.pages.useredit', compact('users', 'editUser'));
    }

    public function DoctorList()
    {
        $doctors = Doctor::all(); // or Doctor::paginate(10) for pagination
        return view('admin.pages.doctorlist', compact('doctors'));
    }

    public function Appointment()
    {
        $appointments = Appointment::all(); // or Doctor::paginate(10) for pagination
        return view('admin.pages.appointments', compact('appointments'));
    }
}
