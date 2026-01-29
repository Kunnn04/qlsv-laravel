<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy tuổi từ session
        $age = session('age');

        // Kiểm tra xem tuổi có tồn tại không
        if (!$age) {
            return response("Không được phép truy cập", 403);
        }

        // Kiểm tra xem tuổi có phải số không
        if (!is_numeric($age)) {
            return response("Không được phép truy cập", 403);
        }

        // Kiểm tra tuổi >= 18
        if ((int)$age < 18) {
            return response("Không được phép truy cập", 403);
        }

        return $next($request);
    }
}
