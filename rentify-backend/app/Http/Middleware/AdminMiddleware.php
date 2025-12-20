<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Belum login
        if (!Auth::check()) {
            return $this->unauthorizedResponse($request);
        }

        // Bukan admin
        if (Auth::user()->role !== 'admin') {
            return $this->unauthorizedResponse($request);
        }

        return $next($request);
    }

    /**
     * Response jika akses ditolak
     */
    protected function unauthorizedResponse(Request $request)
    {
        // Untuk API
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Akses ditolak, hanya admin'
            ], 403);
        }

        // Untuk WEB
        abort(403, 'Akses ditolak, hanya admin');
    }
}
