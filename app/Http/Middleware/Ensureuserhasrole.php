<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\JsonResponse;
class Ensureuserhasrole






{
    use JsonResponse;
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,string ...$roles): Response
    {
        $userRoles =$request->user()->roles; 
        $found= array_intersect($userRoles,$roles);    
        if(count($found)===0) return $this->jsonResponse(403,'not aliiowed to visit this route !!');
        return $next($request);
    }
}
