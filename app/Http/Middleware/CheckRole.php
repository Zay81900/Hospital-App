<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        // Check if user is a doctor
        if ($role === 'doctor' && $user->getTable() === 'doctors') {
            return $next($request);
        }
        
        // Check if user is an admin (role = 1)
        if ($role === 'admin' && $user->getTable() === 'users' && $user->role == 1) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access');
    }
} 