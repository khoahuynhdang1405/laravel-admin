<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessTime
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now();
        $start = Carbon::createFromTime(7, 0);
        $end = Carbon::createFromTime(12, 0);

        if($now->lessThan($start) || $now->greaterThan($end)){
            return response('Vui lòng quay lại vào lúc 7h => 12h');
        }
        return $next($request);
    }
}