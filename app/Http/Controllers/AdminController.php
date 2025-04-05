<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function UserList()
{
    $users = User::all(); // or User::paginate(10) for pagination
    return view('admin.pages.userlist', compact('users'));
}

    public function DoctorList()
    {
        return view('admin.pages.doctorlist');
    }
}
