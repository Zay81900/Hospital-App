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
        // dd($id);
        // $user = User::findOrFail($id);

        // if ($user) {
        //     $user->username = $data['username'];
        //     $user->email = $data['email'];
        //     // $user->password = Hash::make($data['password']);
        //     $user->image = $data['image'];
        //     $user->address = $data['address'];
        //     $user->gender = $data['gender'];
        //     $user->age = $data['age'];
        //     $user->phone = $data['phone'];
        
        //     $user->save();
        // }
        $user = User::findOrFail($id);
        $user->username = request('username');
        $user->email= request('email');
        $user->image = request()->file('image')->getClientOriginalName();
        $user->address= request('address');
        $user->gender = request('gender');
        $user->age = request('age');
        $user->phone = request('phone');
        $user->save();
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