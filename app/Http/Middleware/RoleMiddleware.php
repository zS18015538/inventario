<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */

     public function handle(Request $request, Closure $next)
{
    $userRole = trim(strtolower($request->user()->rol->nombre ?? ''));

    \Log::info('User Role:', ['role' => $userRole]);

    // Aceptar acceso solo si el rol es administrador o almacenista
    $allowedRoles = ['administrador', 'almacenista'];
    \Log::info('Allowed Roles:', ['roles' => $allowedRoles]);

    if (!in_array($userRole, $allowedRoles)) {
        \Log::warning('Access denied for user with role:', ['role' => $userRole]);
        return redirect('/unauthorized')->withErrors(['error' => 'No tienes permiso para acceder a esta página.']);
    }

    return $next($request);
}

}