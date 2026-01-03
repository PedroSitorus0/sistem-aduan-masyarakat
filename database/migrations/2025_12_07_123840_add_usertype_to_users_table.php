<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek 1: Apakah sudah login?
        if (Auth::check()) {

            // Cek 2: Apakah usertype-nya admin?
            if (Auth::user()->usertype === 'admin') {
                return $next($request); // Silakan masuk bos!
            }

            // Jika bukan admin, tendang ke dashboard biasa
            return redirect('/dashboard');
        }

        // Jika belum login, tendang ke halaman login
        return redirect('/login');
    }
}