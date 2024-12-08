<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect based on user role
        return $this->verifyRoleRedirect($user);
    }

    protected function verifyRoleRedirect($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'student':
                return redirect()->route('student.dashboard');
            case 'teacher':
                return redirect()->route('teacher.dashboard');
            case 'owner':
                return redirect()->route('owner.dashboard');
            default:
                return redirect()->route('login')->with('error', 'Unauthorized access');
        }
    }
}
