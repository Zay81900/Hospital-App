<?php

namespace App\Services;

use App\Contracts\Dao\AuthDaoInterface;
use App\Contracts\Services\AuthServiceInterface;

// class AuthService implements AuthServiceInterface
// {
//     public function register(array $data)
//     {
//         $user = new User();
//         $user->username = $data['username'];
//         $user->email = $data['email'];
//         $user->password = Hash::make($data['password']);
//         $user->role = 2; // Default role for regular users
//         $user->address = $data['address'];
//         $user->gender = $data['gender'];
//         $user->blood_type = $data['blood_type'];
//         $user->age = $data['age'];
//         $user->phone = $data['phone'];
//         $user->disease_description = $data['disease_description'];
//         $user->save();

//         return $user;
//     }
// } 

class AuthService implements AuthServiceInterface
{
    /**
     * auth Dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param authDaoInterface
     * @return void
     */

    public function __construct(AuthDaointerface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * register User
     * @return object
     */

    public function register(array $data): object{
        return $this->authDao->register($data);
    }
}