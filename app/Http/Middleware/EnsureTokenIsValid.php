<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->_token ? $request->_token : $request->header('x-csrf-token');
        if (csrf_token() !== $token) {
            $json_data = array(
                'header' => array('code' => 401, 'status' => 'error', 'message' => 'CSRF token is not valid'),
                'body' => array('result' => $token)
            );
            return response()->json($json_data, 401);
        }
        return $next($request);
    }
}
