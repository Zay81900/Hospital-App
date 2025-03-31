<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\UserServiceInterface;
use App\Models\Auth;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


    public function edit($id) {
        $user = $this->userService->edit($id);
        return view('user.profileEdit', ['user'=> $user]);
    }


    public function profile_update(UserEditRequest $request, $id)        
    {
            $validatedData = $request->validated();
    
            $updateData = [
                'username' => $validatedData['username'],
                'address' => $validatedData['address'],
                'gender' => $validatedData['gender'],
                'phone' => $validatedData['phone'],
                'image' => $validatedData['image'],
            ];
            $this->userService->update($id, $updateData);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    
    
}