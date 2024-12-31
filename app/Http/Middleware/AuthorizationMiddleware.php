<?php

namespace App\Http\Middleware;

use App\Http\Responses\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->bearerToken();
        if($accessToken != 'abcdefghigklmnopqrstu'){
            return ApiResponse::baseResponse(false,'wrong access token',401);
        }
        return $next($request);
    }
}
