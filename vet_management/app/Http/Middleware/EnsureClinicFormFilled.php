<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureClinicFormFilled
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->type === 'client' && $request->route()->getName() === 'clinic.register.view') {
            return redirect()->route('dashboard.view');
        }

        if ($user && $user->type === 'admin') {
            if ($user->clinic && $request->route()->getName() === 'clinic.register.view') {
                return redirect()->route('admin-dashboard.view');
            }

            if (!$user->clinic && $request->route()->getName() !== 'clinic.register.view') {
                return redirect()->route('clinic.register.view');
            }
        }

        return $next($request);
    }
}
