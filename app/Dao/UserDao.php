<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserDao implements UserDaoInterface
{
    /**
     * Show User
     * @return object
    */
    public function get(): object
    {
        return User::paginate(3);
    }

    /**
     * Store User
     * @return void
    */
    public function store() : void
    {
        $user = New User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->gender = request('gender');
        $user->age = request('age');
        $user->role = request('role');
        $image = request()->file('image');
        $imageName = $image->getClientOriginalName();
        $user->image = $imageName;
        $user->disease_description = request('disease_description');
        $user->address = request('address');
        
        $user->save();
    }

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object
    {
        return User::findOrFail($id);
    }

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->name = $data['name'];
            $user->password = Hash::make($data['password']);
            $user->role = $data['role'];
            $user->image = $data['image']->getClientOriginalName();
            $user->address = $data['address'];
            $user->gender = $data['gender'];
            $user->age = $data['age'];
            $user->phone = $data['phone'];
        
            $user->save();
        }
    }

    /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}