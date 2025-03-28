<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response;

class CheckTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        list($subdomain) = explode('.', $request->getHost(), 2);

        // Retrieve requested tenant's info from database. If not found, abort the request.
        $tenant = Company::where('slug', $subdomain)->firstOrFail();
        
        // Store the tenant info into session.
        $request->session()->put('tenant', $tenant);

        return $next($request);
    }
}
