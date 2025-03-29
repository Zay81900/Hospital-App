<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\UserServiceInterface;
use App\Models\Auth;

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

    // public function edit($id) {
    //     $user = $this->userService->edit($id);
    //     return view('user.profile.update', ['user'=> $user]);
    // }

    public function ProfileUpdate(UserEditRequest $request, $id) {
        $user = Auth::user();
        $id = 1;
        $this->userService->update($id, $request->validated());
        
        return redirect()->route('user.profile')->with('success','Profile Updated Successfully'. $id .'.'); 
    }


}
