<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function UserList()
    {
        return view('admin.pages.userlist');
    }

    public function DoctorList()
    {
        return view('admin.pages.doctorlist');
    }
}
