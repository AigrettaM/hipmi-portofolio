<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user role is stored in session or request headers
        $userRole = $request->session()->get('admin_role');
        
        // For AJAX requests or when session is not available,
        // we can check via request headers or other methods
        if (!$userRole) {
            // In a real app with proper authentication,
            // you would check: auth()->user()->role
            // For now, we'll deny access if no role is found
            abort(403, 'Access denied. Please log in as Super Admin.');
        }
        
        // Check if user has super admin privileges
        if ($userRole !== 'super_admin') {
            abort(403, 'Access denied. Super admin privileges required.');
        }
        
        return $next($request);
    }
}
