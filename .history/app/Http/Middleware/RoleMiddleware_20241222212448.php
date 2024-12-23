<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        // Check if the user is logged in
        if (!$user) {
            abort(401, 'User not authenticated.');
        }

        // Check if the user is verified
        if ($user->verified !== 1) {
            abort(403, 'User is not verified.');
        }

        // Check if the user is an admin
        if ($user->user_role === 'admin') {
            return $next($request); // Admin has access to all routes
        }

        // Restrict access based on user role
        if (!in_array($user->user_role, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
