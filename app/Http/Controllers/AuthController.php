<?php

namespace App\Http\Controllers;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\RegisterCreateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function LoginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials)) {
            $user->password = Hash::make($credentials['password']);
            $token = $user->createToken('token')->plainTextToken;
            if ($user->role == 1) {
                return redirect()->route('admin.index')
                    ->with('loginMessage','You Have Successfully logined...')
                    ->with('token', $token);
            } else if ($user->role == 2) {
                return redirect()->route('user.index')
                    ->with('loginMessage','You Have Successfully logined...')
                    ->with('token', $token);
            }

        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
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
