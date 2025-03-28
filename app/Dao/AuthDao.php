<?php

namespace App\Dao;

use App\Contracts\Dao\AuthDaoInterface;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthDao implements AuthDaoInterface
{
    public function register(array $data): object
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],    
            // 'image' => $data['image'],
            'address' => $data['address'],
            'gender' => $data['gender'],    
            'age' => $data['age'],
            'phone' => $data['phone'],
            'disease_description'=> $data['disease_description'],
        ]);

        return $user;
    }
}