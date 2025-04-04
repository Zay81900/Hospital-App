<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
<<<<<<< HEAD
  
   

    
=======

    public function UserList()
    {
        return view('admin.pages.userlist');
    }

    public function DoctorList()
    {
        return view('admin.pages.doctorlist');
    }
>>>>>>> 6214a84ad82bb7fbcdc7adc1bb3c4116bbe73235
}
