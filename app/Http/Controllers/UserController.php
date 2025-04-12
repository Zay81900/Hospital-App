<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\UserServiceInterface;
use App\Http\Requests\AppointmentCreateRequest;
use App\Models\Auth;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;

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

    public function appointment() {
        $doctors = Doctor::all();
        return view('user.appointment', ['doctors'=> $doctors]);
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

    public function appointmentStore(AppointmentCreateRequest $request) {
        $doctors = Doctor::all();
        $user = $this->userService->store($doctors);

    }


    public function profile_update(UserEditRequest $request, $id)        
    {
        try {
            $validatedData = $request->validated();
            $updateData = [
                'username' => $validatedData['username'],
                'address' => $validatedData['address'],
                'gender' => $validatedData['gender'],
                'phone' => $validatedData['phone'],
            ];

            if (isset($validatedData['image'])) {
                $path = public_path('images/user');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $image = $validatedData['image'];
                $imageName = $image->getClientOriginalName();
                $image->move($path, $imageName);
                $updateData['image'] = $imageName;
            }

            $this->userService->update($id, $updateData);

            return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'There was an error updating your profile.');
        }
    }

    
    
}