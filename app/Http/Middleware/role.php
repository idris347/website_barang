<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna telah masuk
        if (!auth()->check()) {
            return redirect('login');
        }
        
        $roles = array_slice(func_get_args(), 2);
        foreach ($roles as $role) {
            $user = auth()->user()->role;
            if ($user == $role ) {
                return $next($request);
            }
        }
        
        return redirect('home')->with('error', 'Anda tidak memiliki akses');
    }
}
