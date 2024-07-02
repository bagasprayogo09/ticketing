<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckDivisionAndUsertype
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $divisionId
     * @return mixed
     */
    public function handle(Request $request, Closure $next, int $divisionId)
    {
        $user = Auth::user();

        if ($user->division_id !== $divisionId) {
            return redirect('/')->with('error', 'You do not have access to this section.');
        }

        return $next($request);
    }
}
