<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\UserServiceInterface;


class UserController extends Controller
{
    private $userService;
 
    /**
      * Create a new controller instance.
      * @param userInterface $taskServiceInterface
      * @return void
      */
 
    public function __construct(UserServiceInterface $userServiceInterface) 
    {
       $this->userService = $userServiceInterface;
    }

    public function index() {
        return view('user.index');
    }

    public function contact() {
        return view('user.contact');
    }

    public function blog_detail() {
        return view('user.blog_detail');
    }

    public function Profile() {
        return view('user.profile');
    }

//     public function ProfileUpdate(ProfileUpdateRequest $request) {  
//         $user = Auth::user();
//         $this->profileService->updateProfile($user, $request->all());
//         Session::flash('success','Profile updated successfully.');   
//         return view('user.profile', compact('user')); 
//     }
}
