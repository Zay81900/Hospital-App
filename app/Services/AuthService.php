<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function register(array $data)
    {
        $user = new User();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = 2; // Default role for regular users
        $user->address = $data['address'];
        $user->gender = $data['gender'];
        $user->blood_type = $data['blood_type'];
        $user->age = $data['age'];
        $user->phone = $data['phone'];
        $user->disease_description = $data['disease_description'];
        $user->save();

        return $user;
    }
} 