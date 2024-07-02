<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

            $user = Auth::user();

            // Jika pengguna adalah admin atau koordinator dengan division_id yang sesuai
            if ($user->user_type === 'admin' || ($user->user_type === 'koordinator' && $user->division_id === 1)) {
                return $next($request);
            }

            // Jika pengguna bukan admin atau koordinator yang diperbolehkan
            abort(403, 'Unauthorized action.');
        }
    }

