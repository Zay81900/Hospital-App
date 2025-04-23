<?php

namespace App\Http\Controllers;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\RegisterCreateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function registerUser(RegisterCreateRequest $request)
    {
        $validatedData = $request->validated();
        $this->authService->register([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => 2, 
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'age' => $validatedData['age'],
            'blood_type' => $validatedData['blood_type'],
            'disease_description' => $validatedData['disease_description'],
            'phone' => $validatedData['phone'],
        ]);

        return redirect()->route('auth.login')
            ->with('message', 'Your have Registered Successfully...');
    }

    public function LoginUser(LoginRequest $request)
    {
        // Create a custom log file for authentication
        $logPath = storage_path('logs/auth.log');
        
        // Test direct file writing
        file_put_contents($logPath, "[" . now() . "] Testing login for: " . $request['email'] . "\n", FILE_APPEND);

        // First try doctor login
        $doctor = Doctor::where('email', $request['email'])->first();
        
        if ($doctor) {
            file_put_contents($logPath, "[" . now() . "] Found doctor with ID: " . $doctor->id . "\n", FILE_APPEND);
            
            if (Hash::check($request['password'], $doctor->password)) {
                file_put_contents($logPath, "[" . now() . "] Password matched for doctor\n", FILE_APPEND);
                
                try {
                    Auth::guard('doctor')->loginUsingId($doctor->id);
                    file_put_contents($logPath, "[" . now() . "] Doctor logged in successfully\n", FILE_APPEND);
                    
                    return redirect()->route('doctor.dashboard')
                        ->with('message', 'You Have Successfully logged in as Doctor...');
                } catch (\Exception $e) {
                    file_put_contents($logPath, "[" . now() . "] Error logging in doctor: " . $e->getMessage() . "\n", FILE_APPEND);
                }
            } else {
                file_put_contents($logPath, "[" . now() . "] Password did not match for doctor\n", FILE_APPEND);
            }
        }

        // If not a doctor, try regular user login
        $user = User::where('email', $request['email'])->first();
        
        if ($user) {
            if (Hash::check($request['password'], $user->password)) {
                Auth::guard('web')->loginUsingId($user->id);
                
                if ($user->role == 1) {
                    return redirect()->route('admin.index')
                        ->with('message', 'You Have Successfully logged in as Admin...');
                } else if ($user->role == 2) {
                    return redirect()->route('user.index')
                        ->with('message', 'You Have Successfully logged in as User...');
                }
            }
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function LogoutUser(Request $request)
    {
        Auth::logout();
        
        // Revoke all tokens for the current user
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('user.index')
            ->with('logoutMessage', 'You have been successfully logged out.');
    }
}
